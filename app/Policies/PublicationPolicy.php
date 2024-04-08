<?php

namespace App\Policies;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PublicationPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Publication $publication): bool
    {
        return $user->id === $publication->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Publication $publication): bool
    {
        return $user->id === $publication->user_id;
    }
}
