<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'visit-list',
            'visit-create',
            'visit-edit',
            'visit-delete',
            'vendor-list',
            'vendor-create',
            'vendor-edit',
            'vendor-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'team-list',
            'team-create',
            'team-edit',
            'team-delete',
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
            'designation-list',
            'designation-create',
            'designation-edit',
            'designation-delete',

            'status-change',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
