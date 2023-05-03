<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use App\Models\HitCounter;
use App\Models\LikeArticle;
use Carbon\Carbon;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getAll()
    {
        return Article::orderBy('id', 'DESC')->with('category', 'author', 'tagsDB')->paginate(10);
    }

    public function getPaginate($per_page)
    {
        return Article::with('category')->paginate(($per_page==null?10:$per_page));
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
            $query->where('is_featured','1')->where('category_id',  $category_id)->with('author', 'category');
        }else{
            $query->where('is_featured','1')->with('author', 'category');
        }

        return $query->get();
    }

    public function getLatestPost()
    {
        return Article::latest()->with('category')->get();
    }

    public function detailsPost($Id)
    {
        return Article::where('id', $Id)->with('category', 'author','articleContent', 'articleTextContent', 'articleImageContent', 'articleVideoContent')->get();
    }

    public function relatedPost($Id)
    {
        $article = Article::where('id', $Id)->select('category_id')->first();
        $cat_id = $article->category_id;
        $related_article = Article::where('category_id', $cat_id)->whereNotIn('id',array($Id))->with('category')->get();
        return $related_article;
    }
    public function premiumPost()
    {
        return Article::where('is_trending', '=', '1')->with('author', 'category')->take(4)->get();
    }
    public function popularPost()
    {
        $date = Carbon::today()->subDays(30);
        $article_id = HitCounter::where('created_at','>=',$date)->select('article_id')->take(2)->get();
        $fetch_article = Article::whereIn('id', $article_id)->with('category')->take(4)->get();
        return $fetch_article;
    }
    public function topRatingPost()
    {
        $maxValue = LikeArticle::max('likes');
        $likeArticle = LikeArticle::where('likes', $maxValue)->first();
        if(!is_null($likeArticle)){
            $fetch_article = Article::where('id', $likeArticle->article_id)->with('category', 'author')->first();
            return $fetch_article;
        }
    }
    public function searchPost($search)
    {
        // $converstion = implode(" ", $search);
       
        return Article::where('title', 'LIKE', "%{$search}%")
        ->orWhere('meta_keyword', 'LIKE', "%{$search}%")
        ->orWhere('meta_description', 'LIKE', "%{$search}%")
        // ->orWhere('tags', 'LIKE', "%{$search}%")
        ->orWhere('page_title', 'LIKE', "%{$search}%")
        ->paginate(8);
    }
    public function categoryArticle($category_id)
    {
        return Article::where('category_id', $category_id)->paginate(8);
    }
    public function latestCategoryArticle($category_id)
    {
        return Article::latest()->where('category_id', $category_id)->with('author')->inRandomOrder()->take(1)->get();
    }

    public function latestSingleFeaturePost()
    {
        return Article::latest()->with('category')->inRandomOrder()->take(1)->get();
    }
    public function randomThreeFeaturePost()
    {
        return Article::with('category')->inRandomOrder()->take(3)->get();
    }
    public function singleCategoryPopularPost()
    {
        $maxView = HitCounter::max('raw_hits');
        $popularPost = HitCounter::where('raw_hits', $maxView)->first();
        $article_id = $popularPost->article_id;
        $article = Article::find($article_id);
        return $article;
    }
    public function findTagArticle($id)
    {
        return Article::where('tags', $id)->paginate(10);
    }
}
