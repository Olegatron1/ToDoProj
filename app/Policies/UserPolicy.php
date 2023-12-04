<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return (int)$user->role === User::ROLE_ADMIN
            ? Response::allow()
            : Response::denyWithStatus(403);
    }
}
