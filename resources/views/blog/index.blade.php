@extends('layouts.app')
@section('title','Blog')


@section('content')
<div class="container col-md-8 col-sm-12 py-5">
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
                    <div class="card-body d-flex ">
                        <div class="row">
                            <div class="col-xl-3 col-sm-12 col-12 img_post_container img_post_container_size_sm">
                                <img class="img_post" src="{{asset('/storage/'.$post->image->url)}} "  alt="">
                            </div>
                            
                            <div class="col-xl-9 col-sm-12 col-12">
                                <h3>
                                <a href="{{action('BlogController@show',$post->slug)}}">{{$post->title}}</a></h3>
                                <p>{{mb_substr($post->content,0,300)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
              
        </div>
</div>

@endsection