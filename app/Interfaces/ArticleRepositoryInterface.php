<?php

namespace App\Interfaces;

interface ArticleRepositoryInterface
{
    public function getAll();
    public function getPaginate($per_page);
    public function getById($Id);
    public function delete($Id);
    public function create(array $Details);
    public function update($Id, array $newDetails);
    public function getFeaturedPost($category_id=null);
    public function getLatestPost();
    public function detailsPost($Id);
    public function relatedPost($Id);
    public function premiumPost();
    public function popularPost();
    public function searchPost($search);
    public function categoryArticle($category_id);
    public function latestCategoryArticle($category_id);
    public function latestSingleFeaturePost();
    public function randomThreeFeaturePost();
    public function topRatingPost();
    public function singleCategoryPopularPost();
    public function findTagArticle($tag_name);
    // public function getFulfilled();
}
