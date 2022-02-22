<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'inventory_create',
            ],
            [
                'id'    => 18,
                'title' => 'inventory_edit',
            ],
            [
                'id'    => 19,
                'title' => 'inventory_show',
            ],
            [
                'id'    => 20,
                'title' => 'inventory_delete',
            ],
            [
                'id'    => 21,
                'title' => 'inventory_access',
            ],
            [
                'id'    => 22,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 23,
                'title' => 'property_create',
            ],
            [
                'id'    => 24,
                'title' => 'property_edit',
            ],
            [
                'id'    => 25,
                'title' => 'property_show',
            ],
            [
                'id'    => 26,
                'title' => 'property_delete',
            ],
            [
                'id'    => 27,
                'title' => 'property_access',
            ],
            [
                'id'    => 28,
                'title' => 'business_create',
            ],
            [
                'id'    => 29,
                'title' => 'business_edit',
            ],
            [
                'id'    => 30,
                'title' => 'business_show',
            ],
            [
                'id'    => 31,
                'title' => 'business_delete',
            ],
            [
                'id'    => 32,
                'title' => 'business_access',
            ],
            [
                'id'    => 33,
                'title' => 'tenant_create',
            ],
            [
                'id'    => 34,
                'title' => 'tenant_edit',
            ],
            [
                'id'    => 35,
                'title' => 'tenant_show',
            ],
            [
                'id'    => 36,
                'title' => 'tenant_delete',
            ],
            [
                'id'    => 37,
                'title' => 'tenant_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
