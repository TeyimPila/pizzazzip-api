<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserService
{

    /**
     * Creates a new user or returns user if they already exit.
     *
     * @param array $user
     *
     * @return User
     */
    public function create(array $user): User
    {
        $existingUser = User::where('email', $user['email'])->orWhere('phone', $user['phone'])->first();

        if ($existingUser) {
            return $existingUser;
        }

        return User::create($user);
    }

    /**
     * Updates the given attributes of the given user.
     *
     * @param User  $user
     * @param array $only
     *
     * @return User
     */
    public function update(User $user, array $only): User
    {
        $user->update($only);

        return $user;
    }

}
