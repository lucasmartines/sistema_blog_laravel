<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
class Comment extends Model
{
    //
    protected $guarded = [ "id" ];

    public function user(){
        return $this->belongsTo("App\User");
    }
    
}
