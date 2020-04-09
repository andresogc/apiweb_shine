<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $table = 'comments';

    public function image(){
        return $this->hasMany('App\Image');
    }
}
