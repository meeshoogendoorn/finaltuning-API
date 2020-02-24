<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => "admin",
            'email' => 'admin@admin.com',
            'password' => Hash::make(env("ADMIN_PASSWORD")),
            'admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => "Klant",
            'email' => 'klant@gmail.com',
            'password' => Hash::make(env("DEFAULT_PASSWORD")),
            'admin' => false,
        ]);
    }
}
