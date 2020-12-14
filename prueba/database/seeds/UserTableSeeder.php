<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();
        DB::table('assigned_roles')->truncate();

        $user = User::create([
            'name' => 'Bryan',
            'email' => 'bryanbaez@live.com.mx',
            'password' => '123456'
        ]);

        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'Description' => 'Administrador del sistio web'
        ]);

        $user->roles()->save($role);
    }
}
