<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SaveArticleContentRequest;

use App\Interfaces\ArticleContentRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\ArticleContent;

class ArticleContentController extends Controller
{
    private ArticleContentRepositoryInterface $articleContentRepository;

    public function __construct(ArticleContentRepositoryInterface $articleContentRepository) 
    {
        $this->articleContentRepository = $articleContentRepository;
    }

    public function index(): JsonResponse 
    {
        $getData = $this->articleContentRepository->getAll();
        $allData = CategoryResource::collection($getData);
        return response()->json([
            'data' => $allData,
        ]);
    }

    public function store(SaveArticleContentRequest $request): JsonResponse 
    {
        $articleContentDetails = $request->only([
            'article_id',
            'content_subtitle',
            'content_type',
            'layout',
            'layout_width',
        ]);

        return response()->json(
            [
                'status' => "success",
                'data' => $this->articleContentRepository->create($articleContentDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->articleContentRepository->getById($articleId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');
        
        $articleContentDetails = $request->only([
            'article_id',
            'content_subtitle',
            'content_type',
            'layout',
            'layout_width',
        ]);

        $update = $this->articleContentRepository->update($articleId, $articleContentDetails);
    
        return response()->json([
            'status' => "success",
            'data' =>  $update 
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');
       
        $this->articleContentRepository->delete($articleId);


        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response()->json([
            'status' => "success deleted",
        ]);
    }
    public function articleContentByArticleId(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->articleContentRepository->showArticleContent($articleId)
        ]);
    }
    public function quotesContentById(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->articleContentRepository->showQuotesContent($articleId)
        ]);
    }
}
