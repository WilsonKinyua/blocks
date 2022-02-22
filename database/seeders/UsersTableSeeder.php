<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Wilson Kinyua',
                'email'          => 'wilsonkinyuam@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Patrick Oginga',
                'email'          => 'admin@blocks.co.ke',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'John Doe',
                'email'          => 'user@blocks.co.ke',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
