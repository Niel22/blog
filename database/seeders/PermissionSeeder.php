<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Manage Users
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',

            // Manage Posts
            'view-posts',
            'create-posts',
            'edit-posts',
            'delete-posts',
            'publish-posts',
            'unpublish-posts',

            // Manage Categories
            'view-categories',
            'create-categories',
            'edit-categories',
            'delete-categories',

            // Manage Comments
            'view-comments',
            'delete-comments',

            // Manage Settings
            'view-settings',
            'edit-settings',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name'=> $permission,
            ]);
        }
    }
}
