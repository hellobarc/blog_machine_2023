<?php

namespace App\Http\Resources\Quiz;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
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
            'article_id' => $this->article_id,
            'article_content_id' => $this->article_content_id,
            'quiz_type' => $this->quiz_type,
            'title' => $this->title,
            'question_type' => $this->question_type,
            'status' => $this->status,
        ];
    }
}
