<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\Comment;

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

        $comments = $post->comments->reverse();
        
        

        return view('blog.show',compact('post','image','comments'));
    }
    public function search(  Request $search){
        $_search = $search->input('search');

        if( empty ( $_search) ){
            return redirect(action('BlogController@index'));
        }

        $posts = Post::where('title', 'LIKE', "%$_search%" )->get();

        return view('blog.index',compact('posts','_search'));

    }
}

