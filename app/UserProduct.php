<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
