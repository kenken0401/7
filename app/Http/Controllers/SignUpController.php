<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SignUp;
use App\Models\Companies;
use App\Models\Products;
use App\Models\Sales;


class SignUpController extends Controller
{
    public function showList(){

        DB::beginTransaction();

        try{
            $model = new SignUp();
            $companies = $model->getList();
                DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return view('sign_up',['companies' => $companies]);
    }

    public function create(Request $request){

        $request->validate([
            'product_name' => 'required',
            'company_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
        
        DB::beginTransaction();

        try{
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
    
            DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return redirect('signup');
    }


}
