<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role_user = Role::where('role', 'user')->get();
        $role_admin = Role::where('role', 'admin')->get();

        $user = new User;
        $user->username = 'User';
        $user->email = 'user@example.com';
        $user->password = Hash::make('1234');
        $user->role_id = Role::where('role', 'user')->first()->id;
        $user->save();

        $user = new User;
        $user->username = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('1234');
        $user->role_id = Role::where('role', 'admin')->first()->id;
        $user->save();
    }
}
