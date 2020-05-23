<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;

class OrderItemService
{

    public function createItems(Order $order, array $orderItems): array
    {
        $newOrderItems = [];

        foreach ($orderItems as $orderItem) {
            $newOrderItems[] = $this->createItem($order, $orderItem);
        }

        return $newOrderItems;
    }

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

        if (array_key_exists('toppings', $orderItem)){
            foreach ($orderItem['toppings'] as $topping) {
                $this->createItem($order, $topping, $newOrderItem);
            }
        }

        return $newOrderItem;
    }

}
