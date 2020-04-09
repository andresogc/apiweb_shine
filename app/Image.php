<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public function profiles(){
        return $this->belongsTo('App\Profile','profile_id');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function coments(){
        return $this->hasMany('App\Coment');
    }
}
