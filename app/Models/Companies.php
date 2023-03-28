<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Companies extends Model
{
    public function products(){
        return $this->hasMany(Products::class);
    }
}
