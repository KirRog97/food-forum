<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $permissions = [
            // role
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            // post
            'post-list',
            'post-create',
            'post-edit',
            'post-ban',
            'post-delete',

            // comment
            // 'comment-list',
            // 'comment-create',
            // 'comment-edit',
            // 'comment-ban',
            // 'comment-delete',

            // article
            // 'article-list',
            // 'article-create',
            // 'article-edit',
            // 'article-ban',
            // 'article-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // SuperAdmin
        // Throught AuthServiceProvider Gate
        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin
        $admin = Role::create(['name' => 'admin']);
        // Admin: Role
        $admin->givePermissionTo('role-list');
        $admin->givePermissionTo('role-edit');
        // Admin: Post
        $admin->givePermissionTo('post-create');
        $admin->givePermissionTo('post-edit');
        $admin->givePermissionTo('post-ban');
        $admin->givePermissionTo('post-delete');

        // Moderator
        $moderator = Role::create(['name' => 'moderator']);
        // Moderator: Roles
        $admin->givePermissionTo('role-list');
        // Moderator: Post
        $moderator->givePermissionTo('post-create');
        $moderator->givePermissionTo('post-edit');
        $moderator->givePermissionTo('post-ban');

        // User
        $user = Role::create(['name' => 'user'])
            ->givePermissionTo(
                ['post-list', 'post-create', 'post-edit', 'post-delete',]
            );
    }
}
