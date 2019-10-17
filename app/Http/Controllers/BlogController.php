<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;


class BlogController extends Controller
{
    //
    public function index(){
        $posts= Post::orderBy('created_at','desc')->paginate(4);
                    
        return view('blog.index',compact('posts'));
    }
    public function show($slug){
        $post = Post::whereSlug($slug)->firstOrFail();
        $image = $post->image;
        //dd($image);
        return view('blog.show',compact('post','image'));
    }
    public function search(  Request $search){
        $s = $search->input('search');
      //  echo $s;
        $posts= Post::where('title', 'LIKE', "%$s%" )->get();
        //dd($search->input('search'));

//dd($posts);
        return view('blog.index',compact('posts'));

    }
}

