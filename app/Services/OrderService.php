<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Order;

class OrderService
{
    private $userService;
    private $addressService;
    private $orderItemService;

    function __construct(
        UserService $userService,
        AddressService $addressService,
        OrderItemService $orderItemService
    ) {
        $this->userService      = $userService;
        $this->addressService   = $addressService;
        $this->orderItemService = $orderItemService;
    }

    public function create(array $payload): Order
    {
        $user    = $this->userService->create($payload['userDetails']);
        $address = $this->addressService->create($user, $payload['deliveryAddress']);

        $order = Order::create(
            [
                'user_id'    => $user->id,
                'address_id' => $address->id,
                'number'     => $user->id,
                'status'     => 'standBy',
                'note'       => $payload['orderNote'],
            ]
        );

        $this->orderItemService->createItems($order, $payload['orderItems']);

        return $order;
    }

}
