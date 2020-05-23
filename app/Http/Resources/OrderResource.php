<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'note'             => $this->note,
            'user'             => new UserResource($this->user),
            'number'           => $this->number,
            'status'           => $this->status,
            'order_items'      => OrderResource::collection($this->orderItems),
            'delivery_address' => new AddressResource($this->deliverAddress),
            'created_at'       => (string)$this->created_at,
            'updated_at'       => (string)$this->updated_at,
        ];
    }
}
