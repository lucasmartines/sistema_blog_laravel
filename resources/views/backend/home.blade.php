@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Dashboard Admin</h2></div>

                <div class="card-body">
                    
                    <ul style="list-style:none">
                        <li>
                        <i style="float:left"> <span class="mdi mdi-48px mdi-account px-2"></span></i>
                        
                            <div>
                                <h2> Gerenciar Usuario</h2>
                                <a class="btn btn-primary" href="/users">Listar usuarios</a>
                            </div>
                        </li>
                        <li>
                            <i style="float:left"> <span class="mdi mdi-48px mdi-account-key px-2"></span></i>
                              <div>
                                  <h2> Gerenciar Roles</h2>
                                  <a class="btn btn-primary" href="/roles">Ver Roles</a>
                                  <a class="btn btn-success" href="/roles/create">Criar</a>
                              </div>
                        </li>
                        <li>
                            <i style="float:left"> <span class="mdi mdi-48px mdi-lead-pencil px-2"></span></i>                            
                            <div>
                                <h2> Gerenciar Posts</h2>
                                <a class="btn btn-primary" href="/posts">Ver Posts</a>
                                <a class="btn btn-success" href="/posts/create">Criar</a>
                            </div>
                        </li>
                        <li>
                            <i style="float:left"> <span class="mdi mdi-48px mdi-directions px-2"></span></i>                            
                            <div>
                                <h2> Gerenciar Categorias</h2>
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
