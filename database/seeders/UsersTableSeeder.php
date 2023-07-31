<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //User
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'),
                'type' => 'user'
            ],
            //Novelist
            [
                'name' => 'Novelist',
                'email' => 'novelist@gmail.com',
                'password' => Hash::make('111'),
                'type' => 'Novelist'

            ],
            //Poet
            [
                'name' => 'Poet',
                'email' => 'poet@gmail.com',
                'password' => Hash::make('111'),
                'type' => 'Poet'

            ],
            //Essayist
            [
                'name' => 'Essayist',
                'email' => 'essayist@gmail.com',
                'password' => Hash::make('111'),
                'type' => 'Essayist'

            ]
        ]);
    }
}
