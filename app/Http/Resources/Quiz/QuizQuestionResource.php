<?php

namespace App\Http\Resources\Quiz;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizQuestionResource extends JsonResource
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
            'quiz_id'       => $this->quiz_id,
            'question'      => $this->question,
            'question_type' => $this->question_type,
            'marks' => $this->marks,
            'time_limit' => $this->time_limit,
            'status' => $this->status,
        ];
    }
}
