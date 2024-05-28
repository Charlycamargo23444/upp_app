<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'posts',
            'id' => (string)$this->resource->getRouteKey(),
            'attributes' => [
                'title' => $this->title,
                'message' => $this->message,
                'slug' => $this->slug,
                'body' => $this->body,
                'commentable' => $this->commentable,
                'created_at' => (new Carbon($this->created_at))->format('d-m-y H:i:s'),
                'updated_at' => $this->updated_at,
            ],
            'links' => [
                'self' => route('api.posts.show', $this->resource)
            ],
            'relationships' => [
                'user' => new UserResources($this->whenLoaded('user')),
                'Comment' => new CommentResource($this->whenLoaded('commet')),
            ],
            //'createdBy' => [
            //    'id' => $this->user->id,
            //    'name' => $this->user->name,
            //    'email' => $this->user->emial,
            //],
        ];
    }
}
