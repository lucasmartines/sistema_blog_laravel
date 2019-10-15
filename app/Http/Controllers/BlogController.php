<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;


class BlogController extends Controller
{
    //
    public function index(){
        $posts= Post::all();
        return view('blog.index',compact('posts'));
    }
    public function show($slug){
        $post = Post::whereSlug($slug)->firstOrFail();
        $image = $post->image;
        //dd($image);
        return view('blog.show',compact('post','image'));
    }
}
