<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Companies;
use App\Models\Products;
use App\Models\Sales;

class DetailController extends Controller
{
    
    public function showDetail($id){

        $model = new Detail();
        $details = $model->getList($id);
    
        return view('detail', ['details' => $details]);
    }
}
