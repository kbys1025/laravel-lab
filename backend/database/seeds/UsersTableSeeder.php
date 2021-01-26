<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'ユーザー1';
        $user->email = 'user1@example.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
