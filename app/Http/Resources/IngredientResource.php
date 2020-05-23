<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IngredientResource extends JsonResource
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
            'name'        => $this->phone,
            'product'     => new ProductResource($this->product),
            'description' => $this->description,
            'created_at'  => (string)$this->created_at,
            'updated_at'  => (string)$this->updated_at,

        ];
    }
}
