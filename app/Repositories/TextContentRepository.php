<?php

namespace App\Repositories;

use App\Interfaces\TextContentRepositoryInterface;
use App\Models\TextContent;

class TextContentRepository implements TextContentRepositoryInterface 
{
    public function getAll() 
    {
        return TextContent::all();
    }

    public function getById($Id) 
    {
        return TextContent::findOrFail($Id);
    }

    public function delete($Id) 
    {
        TextContent::destroy($Id);
    }

    public function create(array $Details) 
    {
        return TextContent::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return TextContent::whereId($Id)->update($newDetails);
    }

    public function showTextContent($Id) 
    {
        return TextContent::where('article_content_id', $Id)->get();
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
