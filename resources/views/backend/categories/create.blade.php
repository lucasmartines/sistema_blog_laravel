@extends('layouts.app')
@section('title','Todos os usuarios')


@section('content')
<div class="container col-md-8">
<div class="shadow p-3">
    <form method="post">
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
        @if( session('status') )
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @csrf
        <fieldset>
            <legend> Criar nova Categoria </legend>
            <div class="form-group">
                <label for="name" class="">Categoria</label>

                <div class="col-md-6  p-0">
                    <input id="name" class="form-control" name="name" >
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-lg-10">
                    <a      type="reset" 
                            class="btn btn-secondary"
                            href="/categories">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </fieldset>

    </form>
</div>
</div>
@endsection