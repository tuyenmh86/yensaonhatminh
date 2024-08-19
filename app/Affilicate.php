<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affilicate extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'affiliate_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function OrderDetail()
    {
        return $this->belongsTo(OrderDetail::class,'order_id');
        
    }
}
