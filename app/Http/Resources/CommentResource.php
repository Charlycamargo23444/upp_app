<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'comments',
            'id' => (string)$this->resource->getRouteKey(),
            'attributes' => [
                'body' => $this->body,
                'commentable' => $this->commentable,
                'created_at' => (new Carbon($this->created_at))->format('d-m-y H:i:s'),
                'updated_at' => $this->updated_at,
            ],
            'links' => [
                'self' => route('api.comments.show', $this->resource)
            ],
            //'createdBy' => [
            //    'id' => $this->user->id,
            //    'name' => $this->user->name,
            //    'email' => $this->user->emial,
            //],
        ];
    }
}
