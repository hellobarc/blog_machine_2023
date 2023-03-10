<?php

namespace App\Repositories;

use App\Interfaces\ArticleContentRepositoryInterface;
use App\Models\ArticleContent;
use App\Models\Article;

class ArticleContentRepository implements ArticleContentRepositoryInterface 
{
    public function getAll() 
    {
        return ArticleContent::all();
    }

    public function getById($Id) 
    {
        return ArticleContent::findOrFail($Id);
    }

    public function delete($Id) 
    {
        ArticleContent::destroy($Id);
    }

    public function create(array $Details) 
    {
        return ArticleContent::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return ArticleContent::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
    public function showArticleContent($Id) 
    {
        return ArticleContent::where('article_id', $Id)->get();
    }
    public function showQuotesContent($Id) 
    {
        return ArticleContent::where('id', $Id)->where('content_type', 'quote')->get();
    }
    
}
