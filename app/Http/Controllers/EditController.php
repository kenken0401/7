<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edit;
use App\Models\Products;


class EditController extends Controller
{
    public function showEdit($id){

        $model = new Edit();
        $items = $model->getList($id);
        $companies = $model->getCompanies();

        return view('edit', ['items' => $items, 'companies' => $companies]);
    }

    public function update(Request $request,$id){

        $request->validate([
            'product_name' => 'required',
            'company_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $products = Products::find($id);
        $products->product_name = $request->product_name;
        $products->company_id = $request->company_id;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->comment = $request->comment;
        $products->img_path = $request->img_path;
        $products->update();

        return redirect(route('edit',$id));

    }

}
