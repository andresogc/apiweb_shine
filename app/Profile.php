<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profile extends Model
{    
    protected $table = 'profiles';

    public function images(){
        return $this->hasMany('App\Image');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
