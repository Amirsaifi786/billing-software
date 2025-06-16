<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [   
            'User',
            'Role',
            'Permission',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission . " list"]);
            Permission::firstOrCreate(['name' => $permission . " add"]);
            Permission::firstOrCreate(['name' => $permission . " edit"]);
            Permission::firstOrCreate(['name' => $permission . " delete"]);
        }
    }
    
}
