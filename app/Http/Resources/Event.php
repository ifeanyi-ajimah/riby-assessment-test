<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Repo as RepoResource;
class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            // 'test' => 'tester',
            'type' => $this->type,
            'user_id' =>  $this->user_id,
            'repo_id' => $this->repo_id,
             'actor' =>  new UserResource ($this->user), //this is the event repo (based on eloquent relationship)
            'repo' => new RepoResource($this->user),     //this is the event repo (based on eloquent relationship)
            'created_at' => $this->whenCreated,
        ];
    }
}
