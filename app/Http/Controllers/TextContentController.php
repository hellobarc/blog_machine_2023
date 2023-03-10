<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveTextContentRequest;

use App\Interfaces\TextContentRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\TextContent;

class TextContentController extends Controller
{
    private TextContentRepositoryInterface $textContentRepository;

    public function __construct(TextContentRepositoryInterface $textContentRepository) 
    {
        $this->textContentRepository = $textContentRepository;
    }

    public function index(): JsonResponse 
    {
        $getData = $this->textContentRepository->getAll();
        $allData = CategoryResource::collection($getData);
        return response()->json([
            'data' => $allData,
        ]);
    }

    public function store(SaveTextContentRequest $request): JsonResponse 
    {
        $textContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'content',
            'font',
            'font_size',
        ]);

        return response()->json(
            [
                'status' => "success",
                'data' => $this->textContentRepository->create($textContentDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $textContectId = $request->route('id');

        return response()->json([
            'data' => $this->textContentRepository->getById($textContectId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $textContectId = $request->route('id');
        
        $textContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'content',
            'font',
            'font_size',
        ]);
    
        return response()->json([
            'status' => "success",
            'data' => $this->textContentRepository->update($textContectId, $textContentDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $textContectId = $request->route('id');
       
        $this->textContentRepository->delete($textContectId);


        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response()->json([
            'status' => "success deleted",
        ]);
    }
    public function textContentByArticleContentId(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->textContentRepository->showTextContent($articleId)
        ]);
    }
}
