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
            'id'             => $this->id,
            'product_option' => new ProductOptionResource($this->product_option),
            'quantity'       => $this->quantity,
            'parent'         => new self($this->parent), //TODO: make this optional
            'description'    => $this->description,
            'created_at'     => (string)$this->created_at,
            'updated_at'     => (string)$this->updated_at,

        ];
    }
}
