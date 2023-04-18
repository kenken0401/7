<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class Companies extends Model
{
    public function products(){
        return $this->hasMany(Products::class);
    }

    public function getCompanies(){

        $companies = DB::table('companies')->get();

        return $companies;
    }

}
