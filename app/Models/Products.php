<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Companies;
use App\Models\Sales;


class Products extends Model
{
    protected $fillable = ['product_name', 'company_id', 'price', 'stock', 'comment', 'img_path'];

    public function companies(){
        return $this->belongsTo(Companies::class);
    }

    public function sales(){
        return $this->belongsTo(Sales::class);
    }
    
    public function getList($query){

        $query->join('products','products.company_id','=','companies.id')
        ->get();

        return $query;

    }

    public function insertList($products){

        return Products::create($products);

    }

    public function getDetail($id){

        $details = DB::table('products')
        ->join('companies','products.company_id','=','companies.id')
        ->join('sales','products.id','=','sales.product_id')
        ->where('products.id', '=', $id)
        ->get();

        return $details;
    }

    public function getEdit($id){

        $items = DB::table('products')
        ->join('companies','products.company_id','=','companies.id')
        ->join('sales','products.id','=','sales.product_id')
        ->where('products.id', '=', $id)
        ->first();

        return $items;
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
