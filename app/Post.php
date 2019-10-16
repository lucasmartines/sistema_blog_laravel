<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Category;


class Post extends Model
{
 
    protected $guarded = ['id'];

    public function categories(){
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
    public function image(){
        return $this->hasOne('App\Image');
    }
}
