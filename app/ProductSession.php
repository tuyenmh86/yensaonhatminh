<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSession extends Model
{
    public function course(){
        return $this->belongsTo(Product::class);
    }
}
