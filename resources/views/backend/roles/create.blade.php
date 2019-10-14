@extends('layouts.app')
@section('title','Novo Role')


@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="well col-md-8 ">
        <form method="post" class="form-horizontal">
        @csrf
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error }}</p>
            @endforeach
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <fieldset>
                <legend> Criar  novo Role</legend>
                <div class="form-group">
                    <label for="email" class="">Nome</label>

                    <div class="col-md-6  p-0">
                        <input id="email" class="form-control" name="name" >
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </fieldset>
        </form>
       </div>
    </div>
</div>
@endsection
