<?php

namespace App\Http\Resources;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'note'             => $this->note,
            'user'             => $this->user,
            'number'           => $this->number,
            'status'           => $this->status,
            'order_items'      => OrderItemResource::collection($this->orderItems),
            'delivery_address' => $this->address,
            'created_at'       => (string)$this->created_at,
            'updated_at'       => (string)$this->updated_at,
        ];
    }
}
