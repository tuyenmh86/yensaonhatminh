<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
  public function subcategory(){
  	return $this->belongsTo(SubCategory::class, 'sub_category_id');
  }

  public function products(){
  	return $this->hasMany(Product::class, 'subsubcategory_id');
  }
  public function link(){
    return route('subsubcategory.slug',['slugLevel1'->$this->subcategory->category->slug, 'slugLevel2'=>$this->subcategory->slug,'slugLevel3'=>$this->slug]);
  }
  
}