<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-categories');
    }

    /**
     * Determine whether the user can create any models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-categories');
    }

    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user): bool
    {
        return $user->hasPermission('edit-categories');
    }
    
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasPermission('delete-categories');
    }

    
}
