<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$5q9P0xLLuy9CqCgTpe6MbOm04r3gTP.CCD3WuuAP9OQfUf6NHQ17K',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
