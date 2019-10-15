@extends('layouts.app')
@section('title','Todos os Roles')


@section('content')
<div class="container col-md-8 col-sm-12">
            <h2>Todos os Roles</h2>
        
        <div class=" p-0">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            @if( $posts->isEmpty())
                <p> Não tem nenhum usuario no sistema, não sei como você chegou aqui!</p>
            @endif
            @foreach($posts as $post)
                <div class="card m-2">
                    <div class="card-body">
                        <h3>{{$post->title}}</h3>
                        <p>{{mb_substr($post->content,0,300)}}</p>
                    </div>
                </div>
            @endforeach 
              
        </div>
</div>

@endsection