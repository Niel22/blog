<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Roles;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Roles::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Permission::class => PermissionPolicy::class,
        Category::class => CategoryPolicy::class,
        Post::class => PostPolicy::class
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
