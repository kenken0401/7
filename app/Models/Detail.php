<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail extends Model
{

    public function getList($id){

        $details = DB::table('products')
        ->join('companies','products.company_id','=','companies.id')
        ->join('sales','products.id','=','sales.product_id')
        ->where('products.id', '=', $id)
        ->get();

        return $details;
    }

}
