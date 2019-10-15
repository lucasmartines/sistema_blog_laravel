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
            <legend> Modificar Post </legend>
            <div class="form-group">
                <label for="email" class="">Titulo</label>

                <div class="col-md-6  p-0">
                    <input value="{{ $post->title }}" id="email" class="form-control" name="title" >
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="">Conteudo</label>

                <div class="col-md-12  p-0">
                    <textarea id="content"   class="form-control" row="3" name="content" >
                       {{$post->content}}
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="category" class="">Categorias</label>

                <div class="col-md-4  p-0">
                    <select class="form-control" 
                             id="category"
                             name="categories[]" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if(in_array($category->id,$selectedCategories))  
                                    selected="selected"
                                @endif
                                    >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-10">
                    <button type="reset" 
                            class="btn btn-secondary">
                        Cancel
                    </button>
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