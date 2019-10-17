<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Role;
use App\Http\Requests\RoleFormRequest;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    
    public function index(){
       $roles = Role::all();
       return view('backend.roles.index',compact('roles'));
    }
    public function create(  ){

        
        return view('backend.roles.create');
    }
    public function store(RoleFormRequest $request){

        $role = new Role(
            array(
                'name' => $request->get('name')
            )
        );

        $role->save();

        return redirect('/roles/create')->with('status','Nova role criada');
        
    }
    public function addRoleToUser(Request $req){
        $user_id = $req->get('user_id');
        $id = $req->get('role_id'); 
        
        
        DB::table('role_user')->insert(
            [
                'user_id'=>$user_id,
                'role_id' => $id
            ]
        );

        return back()->with('status','Adicionado role para usuario');

    }
    public function removeRoleToUser(Request $req){

         $user_id = $req->get('user_id');
         $role_id = $req->get('role_id'); 
       
        DB::table('role_user')
            ->where('user_id','=',$user_id)
            ->where('role_id','=',$role_id)
            ->delete();

        return back()->with('status','Removido role para usuario atual');
    }
    public function removeRole($role_id){
        //
        
    }
}
