<?php

namespace Database\Seeders;

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
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $studentRole = Role::create(['name' => 'student']);

        // Create permissions
        $manageStudentsPermission = Permission::create(['name' => 'manage students']);
        $addArticlePermission = Permission::create(['name' => 'add article']);
        $editOwnArticlePermission = Permission::create(['name' => 'edit own article']);
        $deleteOwnArticlePermission = Permission::create(['name' => 'delete own article']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($manageStudentsPermission);
        $studentRole->givePermissionTo($addArticlePermission);
        $studentRole->givePermissionTo($editOwnArticlePermission);
        $studentRole->givePermissionTo($deleteOwnArticlePermission);
    }
}

