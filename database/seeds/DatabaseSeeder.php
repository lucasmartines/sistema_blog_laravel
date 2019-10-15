<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

      
        $user = new User(
            array(
                'name' => 'Super Usuario',
                'email'=> 'root@root.com',
                'password' => bcrypt('rootroot')
            )
        );
        
        $user->save();

        $role_admin = new Role(array(
            'name'=>'admin'
        ));
        $role_admin->save();

        $role_user = new Role(array(
            'name'=>'user'
        ));
        $role_user->save();

        $user->roles()->save($role_admin);

        $category = new Category(
            array(
                'name'=>'Todos'
            )
        );
        $category->save();



    }
}
