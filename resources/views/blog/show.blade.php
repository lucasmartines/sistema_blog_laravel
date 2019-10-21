@extends('layouts.app')
@section('title','Todos os usuarios')


@section('content')
<div class="w-100" style="height:300px;overflow:hidden;">
@if($image)
<div  class="img_post_container img_post_container_size_md" >
    <img class=" img_post "
         src="{{asset('/storage/'.$image->url)}}" alt=""  >
</div>
@endif
</div>
<div class="container col-md-8">
    <div class="shadow p-3">
    <a href="{{action('BlogController@index')}}">Voltar</a>
        
        <h1 class="text-center"> {{$post->title}}</h1>
        <hr>
        <p class="blog_text  mx-auto" style="max-width:550px;font-size:1.2em;line-height:1.7em">
            {{$post->content}}
        </p>

    </div>
</div>


<!-- formulario comentario -->
@if( Auth::user() )
<div class="container col-md-8 shadow p-3">
    <form action="/comment" method="post" class=" ">
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
        @if( session('status') )
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @csrf
        <input type="hidden" name="post_id" value="{!! $post->id !!}">
        <input type="hidden" name="post_type" value="App\Post">
        <input type="hidden" name="user_id" value="{!! Auth::id() !!}">
        <fieldset class="">
            <legend>
            Comentar
            </legend>
            <div class="form-group">
                    <label for="content" class="">Comentario</label>

                    <div class="col-md-8  p-0">
                        <textarea row="3" id="content" class="form-control" name="comment" ></textarea>
                    </div>
                </div>
            <div class="form-group">
                <div class="col-lg-10">
                    <button type="reset" 
                            class="btn btn-secondary">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </fieldset>
    </form>
    <h5> 
        <b>
            Comentarios
        </b>
    </h5>
    <!-- comentarios -->
    @foreach($comments as $comment)
        <p> Data: {!! $comment->updated_at !!}
        <p> Usuario: <b> {!! $comment->user->name !!} </b></p>
        <p> Comentario:  {!! $comment->comment !!} </p>
        <hr>
    @endforeach
</div>
@else
<div class="container col-md-8">
    <h3> Faça o  <a href="{{url('login')}}">Login</a> para comentar!</h3>
   
</div>
@endif
<!-- comentarios -->

@endsection