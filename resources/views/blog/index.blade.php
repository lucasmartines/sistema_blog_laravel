@extends('layouts.app')
@section('title','Blog')


@section('content')
<div class="container col-md-8 col-sm-12">
        <h2>Todos os Posts</h2>
        
        <div class=" p-0">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            @if( $posts->isEmpty())
                <p> Nenhum Post!</p>
            @endif
            @foreach($posts as $post)
                <div class="card m-2">
                    <div class="card-body d-flex">
                        
                        <img class="img_post" src="{{asset('/storage/'.$post->image->url)}} "  alt="">
                        
                        <div class="m-2">
                            <h3>
                            <a href="{{action('BlogController@show',$post->slug)}}">{{$post->title}}</a></h3>
                            <p>{{mb_substr($post->content,0,300)}}</p>
                        </div>
                    </div>
                </div>
            @endforeach 
              
        </div>
</div>

@endsection