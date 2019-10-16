<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
 
Auth::routes();

Route::get('/', function(){
    return view('welcome');
});
Route::get('/user', 'HomeController@index');

/**ROTAS blog */
Route::get('/blog','BlogController@index')->name("blog");
Route::get('/blog/{slug?}','BlogController@show');


Route::group(['middleware'=>['auth']],function(){
    

    /* rota para pagina não autorizada */
    Route::get('/permision-denied', 'HomeController@permisionDenied');
    
    
    /** resolve o problema no redirect do bug */
    Route::get('/home', function(){
        return redirect('/');
    });


    /* admin area */
    Route::group(['middleware'=>['admin']],function()
    {


        
   
        /*ROTA painel ADMIN */
        Route::get('/dashboard','Admin\PagesController@home')->name('dashboard');


        /*ROTAS roles */
        Route::get('roles','Admin\RolesController@index');
        Route::get('roles/create','Admin\RolesController@create');
        Route::post('roles/create','Admin\RolesController@store');
        Route::get('roles/addRoleToUser','Admin\RolesController@addRoleToUser');
        Route::get('roles/removeRoleToUser','Admin\RolesController@removeRoleToUser');
        

       

        /**ROTAS users */
        Route::get('/users', 'Admin\UsersController@index');
        Route::get('/users/{id?}/edit', 'Admin\UsersController@edit');
        Route::post('/users/{id?}/edit', 'Admin\UsersController@update');

        
        /**ROTAS post */
        Route::get('posts','Admin\PostsController@index');
        Route::get('posts/create','Admin\PostsController@create');
        Route::post('posts/create','Admin\PostsController@store');
        Route::get('posts/{id?}/edit','Admin\PostsController@edit');
        Route::post('posts/{id?}/edit','Admin\PostsController@update');


        /**ROTAS categories */
        Route::get('categories','Admin\CategoriesController@index');
        Route::get('categories/create','Admin\CategoriesController@create');
        Route::post('categories/create','Admin\CategoriesController@store');

        
    });




});
