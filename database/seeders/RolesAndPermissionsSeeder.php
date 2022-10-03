<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /*
        |------------------------------
        | Seed Permissions and Role
        |------------------------------
        |
        | Example:
        |
        |
        | Permission::firstOrCreate(['name' => 'READ_USERS']);
        | Permission::firstOrCreate(['name' => 'CREATE_USERS']);
        | Permission::firstOrCreate(['name' => 'EDIT_USERS']);
        | Permission::firstOrCreate(['name' => 'DELETE_USERS']);
        |
        | $role = Role::firstOrCreate(['name' => 'super-admin']);
        | $role->givePermissionTo(Permission::all());
        |
        | $role = Role::firstOrCreate(['name' => 'contributor']);
        | $role->givePermissionTo([
        |   'READ_USERS',
        |   'CREATE_USERS',
        |   'EDIT_USERS',
        |   'DELETE_USERS',
        | ]);
        */
    }
}
