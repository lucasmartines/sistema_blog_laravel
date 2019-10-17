<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostEditFormRequest;

use App\Post;
use App\Category;
use App\Image;


class PostsController extends Controller
{
    //
    public function index(){
      
        $posts = Post::all();
        
        return view('backend.posts.index',compact('posts'));
     
    }
    public function create(){

        $categories = Category::all();
        return view('backend.posts.create',compact('categories'));
    }
    public function store( PostFormRequest $request ){

        $post = new Post(
            array(
                'title'=>$request->get('title'),
                'content'=>$request->get('content'),
                'slug'=> Str::slug($request->get('title','-')),
                'user_id'=> Auth::id()
            )
        );



        $img_name = $request->image->getClientOriginalName();
        $img_url = "images\\".$request->image->getClientOriginalName();
        $file = $request->image->storeAs('images', $img_name);
        $post->save();
        $image= new Image(
            array(
                'name' => $img_name,
                'url' => $img_url,
            )
        );
        $post->image()->save($image);

       


        $post->categories()->sync($request->get('categories'));

        return redirect('/posts/create')->with('status','O post foi criado com sucesso');
    }
    public function edit($id){

        $post = Post::whereId($id)->firstOrFail();

        $categories = Category::all();

        

        
        /** tenho que implementar o img url */
        //$image = Image::where($post->post_id)->get();
        $image = $post->image;

        

        if( isset( $post->categories->lists  ) )
        {
            $selectedCategories = $post->categories->lists('id')->toArray();
           // return view('backend.posts.edit',compact('post','categories','selectedCategories'));

        }
        else{
            $selectedCategories = [];
        }
        return view('backend.posts.edit',compact('post','categories','selectedCategories','image'));
    }
    public function update($id,PostEditFormRequest $request){

        $post = Post::whereId($id)->firstOrFail();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->slug = Str::slug($request->get('title','-'));

        if(isset(  $request->image )){

            $post->image()->delete();

            $img_name = $request->image->getClientOriginalName();
            $img_url = "images\\".$request->image->getClientOriginalName();
            $file = $request->image->storeAs('images', $img_name);
            $post->save();


            $image= new Image(
                array(
                    'name' => $img_name,
                    'url' => $img_url,
                )
            );
            $post->image()->save($image);
        }
        

        $post->categories()->sync($request->get('categories'));

        return redirect(action('Admin\PostsController@edit',$post->id))
            ->with('status',"Postagem atualizada");

    }
    public function delete($id){
        
       Post::destroy($id);
        //dd($id);
        return redirect(url('posts'))->with('status',"post $id deletado com sucesso");

    }
}
