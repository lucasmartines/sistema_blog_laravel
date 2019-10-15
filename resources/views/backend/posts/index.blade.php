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
                    <th>Create At</th>
                    <th>Update At</th>
                </tr>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{ $post->id}}
                            </td>
                            <td>
                                <a href="{{action('Admin\PostsController@edit',$post->id)}}">
                                    {{ $post->title}}
                                </a>
                            </td>
                            <td>
                                {{$post->slug}}
                            </td>
                            <td>
                                {{$post->create_at}}
                            </td>
                            <td>
                                {{$post->updated_at}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
@endsection