<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function showList(){
        DB::beginTransaction();
        
        try{
            $model = new Article();
            $product = $model->getList();
        } catch(/Exception $e){
            DB::rollback();
            return back();
        }

        return view('home',['product' => $product]);
    }
}
