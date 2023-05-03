<?php

namespace App\Repositories;

use App\Interfaces\AudioContentRepositoryInterface;
use App\Models\AudioContent;

class AudioContentRepository implements AudioContentRepositoryInterface 
{
    public function getAll($article_content_id) 
    {
        return AudioContent::where('article_content_id', $article_content_id)->with('article', 'articleContent')->get();
    }

    public function getById($Id) 
    {
        return AudioContent::findOrFail($Id);
    }

    public function delete($Id) 
    {
        AudioContent::destroy($Id);
    }

    public function create(array $Details) 
    {
        return AudioContent::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return AudioContent::whereId($Id)->update($newDetails);
    }
    

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
