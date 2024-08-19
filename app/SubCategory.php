<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  public function category(){
  	return $this->belongsTo(Category::class);
  }

  public function subsubcategories(){
  	return $this->hasMany(SubSubCategory::class);
  }
    public function products(){
        return $this->hasMany(Product::class, 'subcategory_id');
    }
    public function link(){
        return route('subcategory.slug',['slugLevel1'=>$this->category->slug,'slugLevel2'=>$this->slug]);
    }
}
