<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'cat_id' => $this->id,
            'cat_name' => $this->cat_name,
            'parent_id' => $this->parent_id,
            'meta_keyword' => $this->meta_keyword,
            'meta_description' => $this->meta_description,
            'page_title' => $this->page_title,
            'thumbnail' => $this->thumbnail,
            'featured_image' => $this->featured_image,
        ];
    }
}
