<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-users');
    }

    public function update(User $user): bool
    {
        return $user->hasPermission('edit-users');
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasPermission('delete-users');
    }

}
