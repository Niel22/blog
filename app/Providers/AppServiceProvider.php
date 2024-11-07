<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Roles;
use App\Policies\CategoryPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-roles', [RolePolicy::class,'viewAny']);
        Gate::define('view-permissions', [PermissionPolicy::class,'viewAny']);

        // Users Access
        Gate::define('view-users', [UserPolicy::class,'viewAny']);
        Gate::define('update-users', [UserPolicy::class,'update']);
        Gate::define('delete-users', [UserPolicy::class,'delete']);

        // Category Access
        Gate::define('view-categories', [CategoryPolicy::class,'viewAny']);
        Gate::define('edit-category', [CategoryPolicy::class,'edit']);
        Gate::define('create-category', [CategoryPolicy::class,'create']);
        Gate::define('delete-category', [CategoryPolicy::class,'delete']);

        // Post Access
        Gate::define('viewAny-posts', [PostPolicy::class, 'viewAny']);
        Gate::define('create-posts', [PostPolicy::class, 'create']);
        Gate::define('update-posts', [PostPolicy::class, 'update']);
        Gate::define('delete-posts', [PostPolicy::class, 'delete']);
        Gate::define('view-post', [PostPolicy::class, 'view']);
        Gate::define('publish-posts', [PostPolicy::class, 'publish']);
    }
}
