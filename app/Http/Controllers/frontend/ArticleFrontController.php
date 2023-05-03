<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveArticleRequest;

use App\Interfaces\ArticleRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleDetailsResource;

use Image;
use File;
use App\Models\Article;

class ArticleFrontController extends Controller
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getFeaturedPost(): JsonResponse
    {
        $getData = $this->articleRepository->getFeaturedPost();
        $allData = ArticleResource::collection($getData);
        return response()->json([
            'data' => $allData,
        ]);
    }
    public function getLatestPost(): JsonResponse
    {
        return response()->json([
            'data' => $this->articleRepository->getLatestPost(),
        ]);
    }

    public function getDetailsPost(Request $request): JsonResponse
    {
        $articleId = $request->route('id');
        return response()->json([
            'data' => $this->articleRepository->detailsPost($articleId)
        ]);
    }
    public function getRelatedPost(Request $request): JsonResponse
    {
        $articleId = $request->route('id');
        return response()->json([
            'data' => $this->articleRepository->relatedPost($articleId)
        ]);
    }
    public function getPremiumPost(): JsonResponse
    {
        return response()->json([
            'data' => $this->articleRepository->premiumPost(),
        ]);
    }
    public function getPopularPost(): JsonResponse
    {
        return response()->json([
            'data' => $this->articleRepository->popularPost(),
        ]);
    }
    public function getSearchPost(Request $request): JsonResponse
    {
        $searchDetails = $request->only([
            'search',
        ]);
        return response()->json([
            'data' => $this->articleRepository->searchPost($searchDetails),
        ]);
    }
    public function categoryWiseArticle(Request $request): JsonResponse
    {
        $categoryId = $request->route('category_id');
        return response()->json([
            'data' => $this->articleRepository->categoryArticle($categoryId)
        ]);
    }

}
