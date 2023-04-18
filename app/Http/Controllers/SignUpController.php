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
            $c_model = new Companies();
            $companies = $c_model->getCompanies();
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
            $products = $request->post();
            $p_model = new Products();
            $items = $p_model->insertList($products);
            DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return redirect('signup');

    }
            
}
