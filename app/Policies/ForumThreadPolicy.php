<?php

namespace shop\Policies;

use shop\User;
use shop\ForumThread;

use Illuminate\Auth\Access\HandlesAuthorization;

class ForumThreadPolicy
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

    public function show(?User $user) {
        return TRUE;
    }

    public function create(User $user) {
        return TRUE;
    }

    public function store(User $user) {

        if ($user->admin || $thread->user_id === $user->id) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function edit(User $user, ForumThread $thread) {

        if ($user->admin || $thread->user_id === $user->id) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function update(User $user, ForumThread $thread) {

        if ($user->admin || $thread->user_id === $user->id) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function destroy(User $user, ForumThread $thread) {

        if ($user->admin || $thread->user_id === $user->id) {
            return TRUE;
        } else {
            return FALSE;
        }

    }
}
