@extends('layouts.app')
@section('title','Todos os Roles')


@section('content')
<div class="container col-md-8 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h2>Todos os Roles</h2>
        </div>
        <div class="card-body  p-0">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            @if( $roles->isEmpty())
                <p> Não tem nenhum usuario no sistema, não sei como você chegou aqui!</p>
            @else
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $roles as $role)
                            <tr>
                                <td>{!! $role->id !!}</td>
                                <td>
                                    <a href="">{!! $role->name!!}</a>
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