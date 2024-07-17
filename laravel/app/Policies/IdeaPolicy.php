<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Idea $id): bool
    {
        return ($user->is_admin || $user->is($id->user));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Idea $id): bool
    {
        return ($user->is_admin || $user->is($id->user));
    }
}
