<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        $role_manager = Role::create(['name' => 'manager']);
        $role_standard = Role::create(['name' => 'standard']);


        $permission_read = Permission::create(['name' => 'read test']);
        $permission_create = Permission::create(['name' => 'create test']);
        $permission_edit = Permission::create(['name' => 'edit test']);
        $permission_delete = Permission::create(['name' => 'delete test']);

        $permission_mark = Permission::create(['name' => 'mark test']);

        $role_manager->syncPermissions([$permission_read, $permission_mark]);
        $role_standard->syncPermissions([$permission_read, $permission_create, $permission_edit, $permission_delete]);
    }
}
