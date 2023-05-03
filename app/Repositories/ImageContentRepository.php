<?php

namespace App\Repositories;

use App\Interfaces\ImageContentRepositoryInterface;
use App\Models\ImageContent;

class ImageContentRepository implements ImageContentRepositoryInterface 
{
    public function getAll($article_content_id) 
    {
        return ImageContent::where('article_content_id', $article_content_id)->with('article', 'articleContent')->get();
    }

    public function getById($Id) 
    {
        return ImageContent::findOrFail($Id);
    }

    public function delete($Id) 
    {
        ImageContent::destroy($Id);
    }

    public function create(array $Details) 
    {
        return ImageContent::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return ImageContent::whereId($Id)->update($newDetails);
    }
    public function showImageContent($Id) 
    {
        return ImageContent::where('article_content_id', $Id)->get();
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
