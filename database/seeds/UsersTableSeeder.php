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
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->role = 'U';
        $user->blocked = 'N';
        $user->password = bcrypt('secret');
        $user->save();

        $admin = new User();
        $admin->name = 'Moch Diki Widianto';
        $admin->email = 'dikiwidia@live.com';
        $admin->role = 'SU';
        $admin->blocked = 'N';
        $admin->password = bcrypt('secret');
        $admin->save();
    }
}
