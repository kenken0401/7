<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Sales extends Model
{
    public function products(){
        return $this->hasMany(Products::class);
    }
}
