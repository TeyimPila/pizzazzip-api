<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Address;
use App\Models\User;

class AddressService
{
    public function create(User $user, array $address): Address
    {
        return Address::create(
            [
                'user_id'        => $user->id,
                'address_line_1' => $address['addressLine1'],
                'address_line_2' => $address['addressLine2'],
                'zip_code'       => $address['zipCode'],
                'phone'          => $user->phone,
            ]
        );
    }

}
