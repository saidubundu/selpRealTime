<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'path' => $this->path,
            'replies' => ReplyResource::collection($this->replies),
            'reply_count' => $this->replies->count(),
            'body' => $this->body,
            'views' => $this->views,
            'watchers' => $this->watchers,
            'created' => $this->created_at->diffForHumans(),
            'user_name' => $this->user->name,
            'user_path' => $this->user->path,
            'user_id' => $this->user_id,
            'category' => $this->category->name,
            'category_id' => $this->category_id,
            'best_reply' => $this->best_reply_id,
        ];
    }
}
