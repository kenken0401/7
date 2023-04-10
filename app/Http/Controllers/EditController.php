<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Edit;
use App\Models\Products;


class EditController extends Controller
{
    public function showEdit($id){
        
        DB::beginTransaction();
        
        try{
            $model = new Edit();
            $items = $model->getList($id);
            $companies = $model->getCompanies();
            DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return view('edit', ['items' => $items, 'companies' => $companies]);
    }

    public function update(Request $request,$id){

        $request->validate([
            'product_name' => 'required',
            'company_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        DB::beginTransaction();

        try{
            $products = $request->post();
            $model = new Edit();
            $items = $model->updateList($products);
            DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return redirect(route('edit', $id, ['items' => $items]));
    }

}
