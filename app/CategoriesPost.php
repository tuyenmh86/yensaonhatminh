<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesPost extends Model
{
    public function parent()
    {
//        return $this->belongsTo('App\User', 'foreign_key', 'other_key');
        return $this->belongsTo(CategoriesPost::class,'parent_id','id');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function images(){
        return $this->hasMany(CategoryImage::class);
    }
    public function children()
    {
        return $this->hasMany(CategoriesPost::class,'parent_id');
    }
    public function link(){
        return route('categories.CategoryPost',$this->alias);
    }
}
