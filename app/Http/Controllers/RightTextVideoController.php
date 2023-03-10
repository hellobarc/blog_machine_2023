<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SaveRightTextVideo;
use App\Interfaces\RightTextVideoRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\ArticleContent;

class RightTextVideoController extends Controller
{
    private RightTextVideoRepositoryInterface $rightTextVideoRepository;

    public function __construct(RightTextVideoRepositoryInterface $rightTextVideoRepository) 
    {
        $this->rightTextVideoRepository = $rightTextVideoRepository;
    }

    public function index(): JsonResponse 
    {
        $getData = $this->rightTextVideoRepository->getAll();
        // $allData = CategoryResource::collection($getData);
        return response()->json([
            'data' => $getData,
        ]);
    }

    public function store(SaveRightTextVideo $request): JsonResponse 
    {
        $articleContentDetails = $request->only([
            'article_content_id',
            'content_title',
            'content_text',
            'video_url',
        ]);

        return response()->json(
            [
                'status' => "success",
                'data' => $this->rightTextVideoRepository->create($articleContentDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->rightTextVideoRepository->getById($articleId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');
        
        $articleContentDetails = $request->only([
            'article_content_id',
            'content_title',
            'content_text',
            'video_url',
        ]);

        $update = $this->rightTextVideoRepository->update($articleId, $articleContentDetails);
    
        return response()->json([
            'status' => "success",
            'data' =>  $update 
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');
       
        $this->rightTextVideoRepository->delete($articleId);
        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response()->json([
            'status' => "success deleted",
        ]);
    }
}
