<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CosdtumerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "This is the ID" => $this->id,
            "name" => $this->name,
            'type' => $this->type,
            'email' => $this->email,
            'city' => $this->city,
            'address' => $this->address,
            'state' => $this->state,
            'postalCode' => $this->postal_code,
        ];
    
    }
}
