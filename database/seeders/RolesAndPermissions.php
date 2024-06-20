<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $roles = ['Admin', 'AccountHolder', 'Parent', 'Employer', 'Child', 'Employee', 'FamilyMember'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Permissions
        $permissions = ['view_all', 'change_all', 'view_all_in_profile', 'change_settings', 'view_settings'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Role-Permission Assignments
        $rolePermissions = [
            'Admin' => ['view_all', 'change_all', 'view_all_in_profile', 'change_settings', 'view_settings'],
            'AccountHolder' => ['view_all_in_profile', 'change_settings', 'view_settings'],
            'Parent' => ['view_all_in_profile', 'change_settings', 'view_settings'],
            'Employer' => ['view_all_in_profile', 'change_settings', 'view_settings'],
            'Child' => ['view_all_in_profile', 'view_settings'],
            'Employee' => ['view_all_in_profile', 'view_settings'],
            'FamilyMember' => ['view_all_in_profile', 'view_settings'],
        ];

        foreach ($rolePermissions as $roleName => $permissions) {
            $role = Role::findByName($roleName);
            $role->syncPermissions($permissions);
        }
    }
}
