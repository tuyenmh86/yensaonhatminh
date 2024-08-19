<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function category(){
  	return $this->belongsTo(Category::class);
  }
  public function parent()
  {
      return $this->belongsTo(Category::class);
  }
  public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
  public function subcategory(){
  	return $this->belongsTo(SubCategory::class);
  }

  public function subsubcategory(){
  	return $this->belongsTo(SubSubCategory::class);
  }

  public function brand(){
  	return $this->belongsTo(Brand::class);
  }

  public function user(){
  	return $this->belongsTo(User::class);
  }

  public function orderDetails(){
    return $this->hasMany(OrderDetail::class);
  }

  public function reviews(){
    return $this->hasMany(Review::class)->where('status', 1);
  }
    public function link(){
      return route('product',$this->slug);
    }
}
