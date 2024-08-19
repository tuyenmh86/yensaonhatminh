<?php

namespace App;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function user_ref(){
        return $this->belongsTo(User::class,'ref_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
