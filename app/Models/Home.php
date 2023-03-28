<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    public function getList(){

        $products = DB::table('products')
        ->join('companies','companies.id','=','products.company_id')
        ->get();

        return $products;
        
    }
    public function getCompanies(){
        
        $companies = DB::table('companies')->get();

        return $companies;

    }
}
