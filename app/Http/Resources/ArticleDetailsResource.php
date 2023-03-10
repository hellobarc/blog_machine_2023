<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleDetailsResource extends JsonResource
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
            'article_id' => $this->id,
            'article_title' => $this->title,
            'category_id' => $this->category_id,
            'page_title' => $this->page_title,
            'thumbnail' =>$this->thumbnail,
            'cat_name' =>$this->category->name,
            // 'cat_id' =>$this->category->id,
        ];
    }
}
