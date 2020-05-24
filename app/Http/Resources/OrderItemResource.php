<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'id'          => $this->id,
            'quantity'    => $this->quantity,
            'toppings'    => self::collection($this->toppings),
            'description' => $this->description,
            'created_at'  => (string)$this->created_at,
            'updated_at'  => (string)$this->updated_at,
        ];
    }
}