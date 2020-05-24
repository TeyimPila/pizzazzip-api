<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;

class OrderItemService
{

    /**
     * Loops through a list of order items and calls a method to save each to the database.
     *
     * @param Order $order
     * @param array $orderItems
     *
     * @return array
     */
    public function createItems(Order $order, array $orderItems): array
    {
        $newOrderItems = [];

        foreach ($orderItems as $orderItem) {
            $newOrderItems[] = $this->createItem($order, $orderItem);
        }

        return $newOrderItems;
    }

    /**
     * Creates an order item and recursively creates it's associated toppings if any exists.
     *
     * @param Order          $order
     * @param array          $orderItem
     * @param OrderItem|null $orderItemParent
     *
     * @return OrderItem
     */
    public function createItem(Order $order, array $orderItem, OrderItem $orderItemParent = null): OrderItem
    {
        $newOrderItem = OrderItem::create(
            [
                'product_id' => $orderItem['id'],
                'order_id'   => $order->id,
                'parent_id'  => $orderItemParent ? $orderItemParent->id : null,
                'quantity'   => $orderItem['quantity'],
            ]
        );

        if (array_key_exists('toppings', $orderItem)) {
            foreach ($orderItem['toppings'] as $topping) {
                $this->createItem($order, $topping, $newOrderItem);
            }
        }

        return $newOrderItem;
    }

}
