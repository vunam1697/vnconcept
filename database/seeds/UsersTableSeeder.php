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
            'user_name' => 'vnconcept',
            'name' => 'ADMIN',
            'image' => 'https://img.icons8.com/bubbles/50/000000/user.png',
            'email' => 'vnconcept@gmail.com',
            'password' => Hash::make('vnconcept@2022'),
            'status' => 1,
            'level' => 1,
        ]);
    }
}