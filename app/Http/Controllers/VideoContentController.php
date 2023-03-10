<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveVideoContentRequest;

use App\Interfaces\VideoContentRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\TextContent;

class VideoContentController extends Controller
{
    private VideoContentRepositoryInterface $videoContentRepository;

    public function __construct(VideoContentRepositoryInterface $videoContentRepository) 
    {
        $this->videoContentRepository = $videoContentRepository;
    }

    public function index(): JsonResponse 
    {
        $getData = $this->videoContentRepository->getAll();
        $allData = CategoryResource::collection($getData);
        return response()->json([
            'data' => $allData,
        ]);
    }

    public function store(SaveVideoContentRequest $request): JsonResponse 
    {
        $videoContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'video_title',
            'video_url',
        ]);

        return response()->json(
            [
                'status' => "success",
                'data' => $this->videoContentRepository->create($videoContentDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $videoContectId = $request->route('id');

        return response()->json([
            'data' => $this->videoContentRepository->getById($videoContectId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $videoContectId = $request->route('id');
        
        $videoContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'video_title',
            'video_url',
        ]);
    
        return response()->json([
            'status' => "success",
            'data' => $this->videoContentRepository->update($videoContectId, $videoContentDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $videoContectId = $request->route('id');
       
        $this->videoContentRepository->delete($videoContectId);


        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response()->json([
            'status' => "success deleted",
        ]);
    }
    public function videoContentByArticleContentId(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->videoContentRepository->showVideoContent($articleId)
        ]);
    }
}
