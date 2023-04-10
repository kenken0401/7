<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Detail;

class DetailController extends Controller
{
    
    public function showDetail($id){

        DB::beginTransaction();
        
        try{
            $model = new Detail();
            $details = $model->getList($id);    
            DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return view('detail', ['details' => $details]);
    }
}
