<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->role = 1 ;
        $user->password = Hash::make('admin');
        $user->remember_token = Str::random(10);

        $user->save();

        $user = new User();

        $user->name = 'Hoàng codegym';
        $user->email = 'codegym@gmail.com';
        $user->role = 1 ;
        $user->password = Hash::make('admin');
        $user->remember_token = Str::random(10);

        $user->save();
    }
}
