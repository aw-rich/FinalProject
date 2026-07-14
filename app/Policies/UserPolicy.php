<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user has the given role.
     */
    public function hasRole(User $user, mixed $role): bool
    {
        return $user->role === $role;
    }
}
