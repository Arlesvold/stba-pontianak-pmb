<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        try {
            DB::transaction(function () {
                // Reset cached roles and permissions
                app()[PermissionRegistrar::class]->forgetCachedPermissions();

                // Create roles for 'admin' guard (used by Filament panel)
                $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'admin']);
                $adminPmb = Role::firstOrCreate(['name' => 'Admin PMB', 'guard_name' => 'admin']);

                // Create Super Admin user
                $admin = User::firstOrCreate(
                    ['email' => 'admin@stbapontianak.ac.id'],
                    [
                        'name' => 'Super Admin',
                        'password' => bcrypt('password'),
                        'no_hp' => '080000000000',
                    ]
                );

                // Sync role to Super Admin (removes old roles, assigns new one)
                $admin->syncRoles([$superAdmin]);
            });

            $this->command->info('Roles and Super Admin user seeded successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to seed roles and admin: ' . $e->getMessage());
            $this->command->error('Seeding failed: ' . $e->getMessage());
        }
    }
}
