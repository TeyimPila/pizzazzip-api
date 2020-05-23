<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserService
{

    public function create(array $user): User
    {
        $existingUser = User::where('email', $user['email'])->first();

        if ($existingUser) {
            return $existingUser;
        }

        return User::create(
            [
                'last_name'  => $user['lastName'],
                'email'      => $user['email'],
                'phone'      => $user['phone'],
                'first_name' => $user['firstName'],
            ]
        );
    }

}
