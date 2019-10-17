@extends('layouts.app')
@section('title','Blog')


@section('content')
<div class="container">
    <div class="row">
       <div class=" col-md-8 col-sm-12 order-1 order-lg-0 order-md-0">
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
                                <div class="img_blog_posts">
                                    <img class="img_post img_blog_posts" src="{{asset('/storage/'.$post->image->url)}} "  alt="">
                                </div>
                                
                                <div class="col">
                                    <h3>
                                        <a href="{{action('BlogController@show',$post->slug)}}">{{$post->title}}</a>
                                    </h3>
                                    <p> Data de publicação: {{date("d/m/Y", strtotime( $post->created_at) )}}</p>
                                    <p>{{mb_substr($post->content,0,300)}}...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
    
        </div>
      

        <aside class="col-md-4 col-12 order-0 order-lg-1 order-md-1">
            <div class="card">
                <div class="card-header bg-dark">
                    <h2 class="text-white">A side</h2>
                </div>
                <div class="card-body">
                    
                    <form class="form-inline" method="post" action="/blog/search">
                        <!-- Search form -->
                        @csrf
                        <div class="md-form mt-0 w-100">
                          <input class="form-control w-100" name="search" placeholder="Buscar um post" aria-label="Search">
                        </div>
                    </form>
                </div>
            </div>
            
        </aside>
    </div>
</div>
@if( isset($posts->links ) )
    {{ $posts->links() }}
@endif
@endsection