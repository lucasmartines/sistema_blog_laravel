@extends('layouts.app')

@section('content')
<div class="container " >
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">
                    <h2>Dashboard Admin</h2>
                </div>

                <div class="card-body">
                    
                    <ul class="pl-0" style="list-style:none">
                        <li class="d-flex">
                        <i > <span class="mdi mdi-48px mdi-account px-2"></span></i>
                        
                            <div>
                                <h4> Gerenciar Usuario</h4>
                                <a class="btn btn-primary" href="/users">Listar usuarios</a>
                            </div>
                        </li>
                        <li class="d-flex">
                            <i  > <span class="mdi mdi-48px mdi-account-key px-2"></span></i>
                              <div>
                                  <h4> Gerenciar Roles de Usuario</h4>
                                  <a class="btn btn-primary" href="/roles">Ver Roles</a>
                                  <a class="btn btn-success" href="/roles/create">Criar</a>
                              </div>
                        </li>
                        <li class="d-flex">
                            <i > <span class="mdi mdi-48px mdi-lead-pencil px-2"></span></i>                            
                            <div>
                                <h4> Gerenciar Posts</h4>
                                <a class="btn btn-primary" href="/posts">Ver Posts</a>
                                <a class="btn btn-success" href="/posts/create">Criar</a>
                            </div>
                        </li>
                        <li class="d-flex">
                            <i  > <span class="mdi mdi-48px mdi-directions px-2"></span></i>                            
                            <div>
                                <h4> Gerenciar Categorias</h4>
                                <a class="btn btn-primary" href="/categories">Ver Categorias</a>
                                <a class="btn btn-success" href="/categories/create">Criar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    TSidebar
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            teste
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
