<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
   
    public function subcategories(){
    	return $this->hasMany(SubCategory::class);
    }


    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
   
    public function link(){
        return route('category.slug',['slugLevel1'=>$this->slug]);

    }
    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
