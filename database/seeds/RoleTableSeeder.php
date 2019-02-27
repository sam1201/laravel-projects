<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\role',1)->create([
            'id'=>'1',
            'name'=>'admin'
        ]);

        factory('App\role',1)->create([
            'id'=>'2',
            'name'=>'user'
        ]);
    }
}
