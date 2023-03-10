<?php

namespace App\Repositories;

use App\Interfaces\VideoContentRepositoryInterface;
use App\Models\VideoContent;

class VideoContentRepository implements VideoContentRepositoryInterface 
{
    public function getAll() 
    {
        return VideoContent::all();
    }

    public function getById($Id) 
    {
        return VideoContent::findOrFail($Id);
    }

    public function delete($Id) 
    {
        VideoContent::destroy($Id);
    }

    public function create(array $Details) 
    {
        return VideoContent::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return VideoContent::whereId($Id)->update($newDetails);
    }
    public function showVideoContent($Id) 
    {
        return VideoContent::where('article_content_id', $Id)->get();
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
