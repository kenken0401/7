<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SignUp extends Model
{
    public function getList(){
        
        $companies = DB::table('companies')->get();

        return $companies;
    }
}
