<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Products;

class DetailController extends Controller
{
    
    public function showDetail($id){

        DB::beginTransaction();
        
        try{
            $p_model = new Products();
            $details = $p_model->getDetail($id);    
            DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return view('detail', ['details' => $details]);
    }
}
