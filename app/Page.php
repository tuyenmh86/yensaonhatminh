<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function link(){
        return route('page',$this->alias);
    }
}
