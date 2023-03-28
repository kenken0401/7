<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignUp;
use App\Models\Companies;
use App\Models\Products;
use App\Models\Sales;
use Illuminate\Support\Facades\DB;


class SignUpController extends Controller
{
    public function showList(){

        $model = new SignUp();
        $companies = $model->getList();

        return view('sign_up',['companies' => $companies]);
    }

    public function create(Request $request){

        $request->validate([
            'product_name' => 'required',
            'company_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
        
        $product = new Products();
        $product->product_name = $request->product_name;
        $product->company_id = $request->company_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->comment = $request->comment;
        $product->img_path = $request->img_path;
        $product->save();
        
        $product_id = $product->id;
        $sale = new Sales();
        $sale->product_id = $product_id;
        $sale->save();

        return redirect('signup');
    }


}
