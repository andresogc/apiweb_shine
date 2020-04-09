<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    public function images(){
        return $this->belongsTo('App\Image','image_id');
    }
}
