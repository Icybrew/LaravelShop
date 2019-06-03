<?php

namespace shop\Policies;

use shop\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, User $target_user) {
        return $user->id === $target_user->id;
    }

    public function destroy(User $user, User $target_user) {

        if ($target_user->admin || $user->id === $target_user->id) {
            return FALSE;
        }

        return FALSE;
    }
    
}
