@extends('layouts.app')
@section('title','Todos os usuarios')


@section('content')
<div class="container col-md-8 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h2>Todos os Usuarios</h2>
        </div>
        <div class="card-body  p-0">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            @if( $users->isEmpty())
                <p> Não tem nenhum usuario no sistema, não sei como você chegou aqui!</p>
            @else
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $users as $user)
                            <tr>
                                <td>{!! $user->id !!}</td>
                                <td>
                                    <a href="{!! action('Admin\UsersController@edit',$user->id) !!}">{!! $user->name!!}</a>
                                </td>
                                <td>
                                    {!! $user->email !!}
                                </td>
                                <td>
                                    {{ $user->created_at}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>
</div>

@endsection