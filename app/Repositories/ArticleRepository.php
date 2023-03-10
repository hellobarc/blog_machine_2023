<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use App\Models\HitCounter;
use Carbon\Carbon;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getAll()
    {
        return Article::all();
    }

    public function getPaginate($per_page)
    {
        return Article::paginate(($per_page==null?10:$per_page));
    }

    public function getById($Id)
    {
        return Article::findOrFail($Id);
    }

    public function delete($Id)
    {
        Article::destroy($Id);
    }

    public function create(array $Details)
    {

        return Article::create($Details);
    }

    public function update($Id, array $newDetails)
    {
        return Article::whereId($Id)->update($newDetails);
    }

    public function getFeaturedPost($category_id = null)
    {
        $query = Article::query();

        if($category_id != null){
            $query->where('is_featured','1')->where('category_id',  $category_id)->with('category');
        }else{
            $query->where('is_featured','1')->with('category');
        }

        return $query->get();
    }

    public function getLatestPost()
    {
        return Article::latest()->with('category')->get();
    }

    public function detailsPost($Id)
    {
        return Article::where('id', $Id)->with('category', 'articleContent', 'articleTextContent', 'articleImageContent', 'articleVideoContent')->get();
    }

    public function relatedPost($Id)
    {
        $article = Article::where('id', $Id)->select('category_id')->first();
        $cat_id = $article->category_id;
        $related_article = Article::where('category_id', $cat_id)->whereNotIn('id',array($Id))->get();
        return $related_article;
    }
    public function premiumPost()
    {
        return Article::where('is_premium', '=', '1')->get();
    }
    public function popularPost()
    {
        $date = Carbon::today()->subDays(30);
        $article_id = HitCounter::where('created_at','>=',$date)->select('article_id')->take(2)->get();
        $fetch_article = Article::whereIn('id', $article_id)->get();
        return $fetch_article;
    }
    public function searchPost($search)
    {
        $converstion = implode(" ", $search);
        return Article::where('title', 'LIKE', "%{$converstion}%")
        ->orWhere('meta_keyword', 'LIKE', "%{$converstion}%")
        ->orWhere('meta_description', 'LIKE', "%{$converstion}%")
        ->orWhere('tags', 'LIKE', "%{$converstion}%")
        ->get();
    }
    public function categoryArticle($category_id)
    {
        return Article::where('category_id', $category_id)->get();
    }
    // public function getFulfilledOrders()
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
