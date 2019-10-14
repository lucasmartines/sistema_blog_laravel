@extends('layouts.app')
@section('title','Todos os usuarios')


@section('content')
<div class="container col-md-8 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h2> Editar Usuario</h2>
        </div>
        <form method="post" class="card-body  p-0">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            @foreach($errors->all() as $error)
                <p class="alert alert-danger">
                    {{ $error }}
                </p>
            @endforeach 
            {!! csrf_field() !!}
            <fieldset>
                <legend class="mx-2"> {!!$user->name!!} </legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2">
                            Nome
                        </label>
                        <div class="col-lg-10">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-2">
                            Email
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2">
                            Senha
                        </label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control" id="password" name="password"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2">
                            Confirmar Senha
                        </label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control" id="password" name="password_confirmation"  >
                        </div>
                    </div>
                    <div class="form-group mx-3 ">
                        <button class="btn btn-primary">Modificar</button>
                    </div>
            </fieldset>

        </form>
          <div   class="form-group">
                <label class="col-lg-2 ">
                    Role
                </label>
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{!! $user->id !!}">

                <div class="mx-4">
                    <h4>Suas Roles</h4>
                    <ul>
                    @foreach( $userRoles as $role)
                        <li>
                            <span class="h5">  {{$role['name'] }}   </span>
                            <span> <a href="{{action('Admin\RolesController@removeRoleToUser', [ 'role_id' => $role['id'], 'user_id' => $user->id ] )}}" class="text-danger">Remover Role</a> </span>
                        </li>
                    @endforeach
                    </ul>
                </div>
                
            </div>
        <form method="get" action="/roles/addRoleToUser">
       
            <input type="hidden" name="user_id" value="{!! $user->id !!}">
            {!! csrf_field() !!}
            <div class="form-group">
                <div class="col-lg-4">
                    <select class="form-control " name="role_id">
                        @foreach( $roles as $role)
                            <option  value="{{$role->id}}">
                                {{$role->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button method="submit" class="btn btn-primary mx-4 my-2 btn-sm">Adicionar Role</button>
        </form>
    </div>
</div>
@endsection