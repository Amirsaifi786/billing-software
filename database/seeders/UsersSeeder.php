<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; // Import Permission model
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleStaff = Role::create(['name' => 'Staff']);
        $roleUser = Role::create(['name' => 'User']);

        // Create Admin User and Assign Admin Role
        $adminUser = User::create([
            'id' => '1',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'), // Securely hash the password
        ]);
        $adminUser->assignRole('Admin');

        // Give all permissions to Admin role
        $permissions = Permission::all();
        $roleAdmin->givePermissionTo($permissions);

        // Create Staff User and Assign Staff Role
        $staffUser = User::create([
            'id' => '2',
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff'),
        ]);
        $staffUser->assignRole('Staff');

        // Create User and Assign User Role
        $userUser = User::create([
            'id' => '3',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
        ]);
        $userUser->assignRole('User');
    }
}
