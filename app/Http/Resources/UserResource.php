<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'points' => $this->points,
            'created' => $this->created_at->diffForHumans(),
            'userCount' => $this->count(),
            'questions' => QuestionResource::collection($this->question),
            'replies' => ReplyResource::collection( $this->replies),
        ];
    }
}
