<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Hanya 2 role aktif (guard 'web')
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'user',  'guard_name' => 'web']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@stbapontianak.ac.id'],
            [
                'name'     => 'Super Admin',
                'password' => bcrypt('sintang2026'),
                'no_hp'    => '080000000000',
            ]
        );

        if (! $admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }
    }
}
