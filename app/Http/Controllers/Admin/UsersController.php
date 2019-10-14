<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserEditFormRequest;
class UsersController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('backend.users.index',compact('users'));
    }
    public function edit( $id ){
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();

        $userRoles = $user->roles->toArray();
        //dd($userRoles);
        return view('backend.users.edit',compact('user','roles','userRoles'));

    }
    public function update( $id ,UserEditFormRequest $req ){

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        $user = User::find($id);
        

        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->password =Hash::make($req['password']);
   
       // $user->confirm-password
        $user->save();
      


    //    $req->user()->fill([
    //     'password' => Hash::make($req['password'])
    //     ])->save();


       return back()->with([ 'status' => 'Usuario atualizado' ]);

    }
  
}
