<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Home extends Model
{
    public function getList($query){

        $query->join('products','products.company_id','=','companies.id')
        ->get();

        return $query;

    }
    public function getCompanies(){

        $companies = DB::table('companies')->get();

        return $companies;

    }
}
