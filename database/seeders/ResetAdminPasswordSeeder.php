<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ResetAdminPasswordSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'admin@stbapontianak.ac.id')->first();
        if ($user) {
            $user->password = Hash::make('password');
            $user->save();
            $this->command->info('Password has been reset to: password');

            // Ensure roles match just in case
            $user->assignRole('admin');
            $this->command->info('Roles assigned.');
        } else {
            $this->command->error('User not found!');
        }
    }
}
