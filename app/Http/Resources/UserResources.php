<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return
        [
            'type' => 'users',
            'id' => (string)$this->resource->getRouteKey(),
            'atributes' => [
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->create_at,
            'updated_at' => $this->updated_at,
            ],
            'link' => [
                'self' => route('api.users.show', $this->resource)
            ]

        ];

    }
}
