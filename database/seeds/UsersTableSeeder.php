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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$N0r9dLJKklT9Cmgha0Vpb.UJa08q3S6rpngMql/TyWBF3MwP5juOa',
            'role_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$N0r9dLJKklT9Cmgha0Vpb.UJa08q3S6rpngMql/TyWBF3MwP5juOa',
            'role_id' => '2'
        ]);
    }
}
