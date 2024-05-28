<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'videos',
            'id' => (string)$this->resource->getRouteKey(),
            'attributes' => [
                'title' => $this->resource->title,
                'description' => $this->resource->description,
                'slug' => $this->resource->slug
            ],
            'link' => [
                'self' => route('api.videos.show', $this->resource)
            ]

        ];
    }
}
