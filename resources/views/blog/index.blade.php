@extends('layouts.app')
@section('title','Blog')


@section('content')
<div class="container">
    <div class="row">
       <div class=" col-md-8 col-sm-12 order-1 order-lg-0 order-md-0">
        @if( empty( $_search ))    
            <h2 class="my-sm-3 my-3 my-lg-0" >Todos os Posts</h2>
        @else
            <h2 class="my-sm-3 my-3 my-lg-0" >Busca por: {{$_search}}</h2>
            <a href="{{action('BlogController@index')}}">Voltar</a>
        @endif
            
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
                                    <div class="div text-right">
                                        @if( Auth::check() )
                                            <a href="{{action('Admin\PostsController@edit',$post->id)}}" >Editar Post</a>
                                        @endif
                                    </div>
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
                    
                    <form   method="post" action="/blog/search">
                        <!-- Search form -->
                        @csrf
                        <div class="md-form mt-0  w-100">
                          <input type="search" style="position:relative;" class="form-control w-100 " name="search" placeholder="Buscar um post"  >
                        </div>
                        <br>
                    </form>
                    <div class="my-3">
                        @if( Auth::check() )
                            <a href="{{action('Admin\PostsController@create')}}">Criar um Post</a>
                        @endif
                    </div>
                </div>
            </div>
            
        </aside>
    </div>
</div>

@if( $posts  instanceof \Illuminate\Pagination\LengthAwarePaginator )
    {{ $posts->links() }}
@endif


@endsection