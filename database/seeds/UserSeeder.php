<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'             => '619',
            'name'           => 'Gutrot',
            'email'          => 'holydeath619@gmail.com',
            'password'       => bcrypt('kaka619'),
        ]);
        DB::table('roles')->insert([
            'id'         => '619',
            'name'       => 'super-admin',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'id'         => '700',
            'name'       => 'admin',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'id'         => '900',
            'name'       => 'customers',
            'guard_name' => 'web',
        ]);
        DB::table('model_has_roles')->insert([
            'role_id'    => '619',
            'model_type' => 'App\User',
            'model_id'   => '619',
        ]);
    }
}
