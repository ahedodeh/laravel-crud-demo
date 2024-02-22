<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;


class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->map(function ($customer) {
                return [
                    'id'   => $customer->id,
                    'name' => $customer->name,
                    'email'=> $customer->email,
                    'city' => $customer->city
                ];
            })
        ];
    }
}
