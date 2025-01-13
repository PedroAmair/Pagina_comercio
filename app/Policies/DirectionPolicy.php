<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Direction;

class DirectionPolicy
{
    /**
     * Create a new policy instance.
     */
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Direction $direction): bool
    {
        return $user->id === $direction->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Direction $direction): bool
    {
        return $user->id === $direction->user_id;
    }
}
