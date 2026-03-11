<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /*
        Runs before any other policy check.
    */
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    /*
        Anyone logged in can view posts.
    */
    public function view(User $user, Post $post)
    {
        return true;
    }

    /*
        Anyone logged in can create posts.
    */
    public function create(User $user)
    {
        return true;
    }

    /*
        Owner OR Moderator can update post.
    */
    public function update(User $user, Post $post)
    {
        return $this->isOwner($user, $post) || $user->isModerator();
    }

    /*
        Owner OR Moderator can delete post.
    */
    public function delete(User $user, Post $post)
    {
        return $this->isOwner($user, $post) || $user->isModerator();
    }

    /**
     * Helper method to check ownership.
     */
    private function isOwner(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }
}
