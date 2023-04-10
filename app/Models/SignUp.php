<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class SignUp extends Model
{
    protected $fillable = ['product_name', 'company_id', 'price', 'stock', 'comment', 'img_path'];

    public function getList(){
        
        $companies = DB::table('companies')->get();

        return $companies;
    }

}
