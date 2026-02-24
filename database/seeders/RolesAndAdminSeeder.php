<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles for 'web' guard
        $roleAdminWeb = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $roleUserWeb = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        // Create roles for 'admin' guard (since we separated them)
        $roleAdminGuard = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admin']);

        // create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@stbapontianak.ac.id'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password'),
                'no_hp' => '080000000000',
            ]
        );

        // Assign 'admin' role for both guards to be safe
        $admin->assignRole($roleAdminWeb);
        $admin->assignRole($roleAdminGuard);
    }
}
