<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;
use App\Models\Sales;


class Products extends Model
{
    public function companies(){
        return $this->belongsTo(Companies::class);
    }

    public function sales(){
        return $this->belongsTo(Sales::class);
    }
}
