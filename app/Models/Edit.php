<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

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

    public function updateList($products){
        
        $items = Products::where('id', '=', $products['products_id'])
        ->update([
        'product_name' => $products['product_name'],
        'company_id' => $products['company_id'],
        'price' => $products['price'],
        'stock' => $products['stock'],
        'comment' => $products['comment'],
        'img_path' => $products['img_path'],
        ]);

        return $items;

    }


}
