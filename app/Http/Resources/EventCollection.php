<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\User;
use App\Http\Resources\Repo;
class EventCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'type' => $this->type,
            'actor' =>  User::collection($this->user),
            'repo' => Repo::collection($this->repo),
            'created_at' => $this->whenCreated,
        ];
    }
}
