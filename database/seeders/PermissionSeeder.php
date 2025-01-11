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
            'create role',
            'view role',
            'update role',
            'delete role',
            'create permission',
            'view permission',
            'update permission',
            'delete permission',
            'create user',
            'view user',
            'update user',
            'delete user',
            'create category',
            'view category',
            'update category',
            'delete category',
            'create course',
            'view course',
            'update course',
            'delete course',
            'create lesson',
            'view lesson',
            'update lesson',
            'delete lesson',
            'create language',
            'view language',
            'update language',
            'delete language',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
