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
        $permissions =
        [   
          
            'User',
            'Role',
            'Permission',
       
         ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission." list"]);
             Permission::create(['name' => $permission." add"]);
             Permission::create(['name' => $permission." edit"]);
             Permission::create(['name' => $permission." delete"]);
        }
    }
    
}