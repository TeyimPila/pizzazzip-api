<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Order;

class OrderService
{

    /** @var UserService  */
    private $userService;

    /** @var AddressService  */
    private $addressService;

    /** @var OrderItemService  */
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

    /**
     * Creates a new order.
     *
     * @param array $payload
     *
     * @return Order
     */
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

    /**
     * Updates the values of the given attributes in the given order;
     *
     * @param Order $order
     * @param array $attributes
     *
     * @return Order
     */
    public function update(Order $order, array $attributes): Order
    {
        $order->update($attributes);
        return $order;
    }

}
