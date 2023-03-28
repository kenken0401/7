<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Edit extends Model
{
    public function getList($id){

        $items = DB::table('products')
        ->join('companies','products.company_id','=','companies.id')
        ->join('sales','products.id','=','sales.product_id')
        ->where('products.id', '=', $id)
        ->first();

        return $items;
    }

    public function getCompanies(){
        
        $companies = DB::table('companies')->get();

        return $companies;

    }

}
