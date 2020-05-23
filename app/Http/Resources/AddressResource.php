<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'id'             => $this->id,
            'user'           => new UserResource($this->user),
            'phone'          => $this->phone,
            'zip_code'       => $this->zip_code,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'created_at'     => (string)$this->created_at,
            'updated_at'     => (string)$this->updated_at,
        ];
    }
}
