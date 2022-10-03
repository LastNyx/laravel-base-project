<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'password' => Hash::make('i4madmin')
        ]);

        /*
        |------------------------------
        | Optional (Assign Role Or Permission to user)
        |------------------------------
        | $user->givePermissionTo([
        |   'READ_USERS',
        |   'CREATE_USERS',
        |   'EDIT_USERS',
        |   'DELETE_USERS',
        | ]);
        |
        | $user->assignRole('super-admin');
        */
    }
}
