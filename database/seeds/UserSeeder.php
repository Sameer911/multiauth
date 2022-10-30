<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = New User;
        // $user->name = 'user';
        // $user->email = 'user@user.com';
        // $user->password = Hash::make('password');
        // $user->is_admin = 0;

        // $user->save();
        // $user = New User;
        // $user->name = 'user';
        // $user->email = 'user@user.com';
        // $user->password = Hash::make('password');
        // $user->is_admin = 0;

        // $user->save();
        // DB::table('users')->insert([
        //     'name' => 'User',
        //     'email' => 'user@user.com',
        //     'password' => Hash::make('password'),
        // ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'password' => Hash::make('11223344'),
        ]);
    }
}
