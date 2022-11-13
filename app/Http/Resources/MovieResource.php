<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'year' => $this->year,
            'description' => $this->description,
            'user_id' => new UserResource($this->user),
            'genres' => GenreResource::collection($this->genres),
            'actors' => ActorResource::collection($this->actors),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
