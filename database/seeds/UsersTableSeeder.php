<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User',1)->create([
            'name'=>'samyak',
            'username'=>'samyak',
            'email'=>'tuladharsamyak@yahoo.com',
            'password'=>bcrypt('deadman'),
            'role_id'=>1
        ]);

        factory('App\User',5)->create();
        
    }
}
