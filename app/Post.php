<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(CategoriesPost::class);
    }
    public function link(){
        return route('news',$this->alias);
    }
}
