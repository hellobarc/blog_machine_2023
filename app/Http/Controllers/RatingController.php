<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SaveRatingRequest;

use App\Interfaces\RatingRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\Comments;

class RatingController extends Controller
{
    private RatingRepositoryInterface $ratingRepository;

    public function __construct(RatingRepositoryInterface $ratingRepository) 
    {
        $this->ratingRepository = $ratingRepository;
    }

    // public function index(): JsonResponse 
    // {
    //     $getData = $this->moduleRepository->getAll();
    //     $allData = CategoryResource::collection($getData);
    //     return response()->json([
    //         'data' => $allData,
    //     ]);
    // }

    public function store(SaveRatingRequest $request): JsonResponse 
    {
        $authUser = auth()->user();
        
        $ratingDetails = $request->only([
            'article_id',
            'rating',
        ]);
        $ratingDetails['status'] = 'pending';
        $ratingDetails['user_id'] = $authUser->id;
        return response()->json(
            [
                'status' => "success",
                'data' => $this->ratingRepository->create($ratingDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $commentId = $request->route('id');

        return response()->json([
            'data' => $this->commentRepository->getById($commentId)
        ]);
    }

    // public function update(Request $request): JsonResponse 
    // {
    //     $moduleId = $request->route('id');
        
    //     $moduleDetails = $request->only([
    //         'name',
    //         'meta_keyword',
    //         'meta_description',
    //         'page_title',
    //     ]);
    //     $moduleDetails['slug'] = Str::slug($request->input('name') ,"-");
    //     return response()->json([
    //         'status' => "success",
    //         'data' => $this->moduleRepository->update($moduleId, $moduleDetails)
    //     ]);
    // }

    // public function destroy(Request $request): JsonResponse 
    // {
    //     $moduleId = $request->route('id');
       
    //     $this->moduleRepository->delete($moduleId);


    //     // return response()->json(null, Response::HTTP_NO_CONTENT);
    //     return response()->json([
    //         'status' => "success deleted",
    //     ]);
    // }

}
