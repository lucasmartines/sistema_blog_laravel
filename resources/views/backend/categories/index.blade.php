@extends('layouts.app')
@section('title','Todos os usuarios')


@section('content')

<div class="container">
    <div class="col-md-8 mx-auto">
        <div class="card-header">
            <h2>Todas as Categorias</h2>
        </div>
        <div class="card-body p-0">
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
        @if( session('status') )
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if($categories->isEmpty())
            <p> Não existe nenhuma categoria criada </p>
        @else
            <table class="table">
                  
                <tbody >
                @foreach( $categories as $category )
                    <tr>
                        <td>
                            {{ $category->name }}
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