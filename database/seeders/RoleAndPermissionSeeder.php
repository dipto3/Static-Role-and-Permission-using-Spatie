<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'view-category']);
        Permission::create(['name' => 'edit-category']);
        Permission::create(['name' => 'delete-category']);

        Permission::create(['name' => 'create-subcategory']);
        Permission::create(['name' => 'view-subcategory']);
        Permission::create(['name' => 'edit-subcategory']);
        Permission::create(['name' => 'delete-subcategory']);

        Permission::create(['name' => 'create-size']);
        Permission::create(['name' => 'view-size']);
        Permission::create(['name' => 'edit-size']);
        Permission::create(['name' => 'delete-size']);

        $superadminRole = Role::create(['name' => 'Superadmin']);
        $adminRole = Role::create(['name' => 'Admin']);

        $superadminRole->givePermissionTo([

            'create-users',
            'edit-users',
            'delete-users',
            'create-category',
            'edit-category',
            'delete-category',
            'create-subcategory',
            'edit-subcategory',
            'delete-subcategory',
            'create-size',
            'edit-size',
            'delete-size',

        ]);

        $adminRole->givePermissionTo([
            'create-category',
            'create-subcategory',
            'create-size',
        ]);

    }

}
