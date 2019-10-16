@extends('layouts.app')
@section('title','Todos os Posts')


@section('content')
<div class="container col-md-8">
    <div class="shadow p-3">
        @if( session('status') )
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if( $posts->isEmpty())
            <p>Nenhum Post</p>
        @else
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Slug</th>
                    <th>Atualização</th>
                    <th>Ação</th>
                </tr>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{ $post->id}}
                            </td>
                            <td>
                                <a href="{{action('BlogController@show',$post->slug)}}">
                                    {{ $post->title}}
                                </a>
                            </td>
                            <td>
                                {{$post->slug}}
                            </td>
                            
                            <td>
                                {{$post->updated_at}}
                            </td>
                            <td>
                                <form method="post" action="{{action('Admin\PostsController@delete',$post->id)}}" class="d-inline">
                                    @csrf
                                <button  
                                   class="btn btn-danger"
                                   type="submit"
                                   >Del</button>
                                </form>
                                <a  
                                    class="btn btn-info"
                                    href="{{action('Admin\PostsController@edit',$post->id)}}">
                                    Update
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
@endsection