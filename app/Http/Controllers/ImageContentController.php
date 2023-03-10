<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveImageContentRequest;

use App\Interfaces\ImageContentRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\ImageContent;

class ImageContentController extends Controller
{
    private ImageContentRepositoryInterface $imageContentRepository;

    public function __construct(ImageContentRepositoryInterface $imageContentRepository)
    {
        $this->imageContentRepository = $imageContentRepository;
    }

    public function index(): JsonResponse
    {
        $getData = $this->imageContentRepository->getAll();
        $allData = CategoryResource::collection($getData);
        return response()->json([
            'data' => $allData,
        ]);
    }

    public function store(SaveImageContentRequest $request): JsonResponse
    {
        $image = $request->file('content');
        $img = time().'.'.$image->getClientOriginalExtension();
        $featured_path = 'uploads/article_content/image_content/' .$img;
        $location = public_path($featured_path);

        $imgFile = Image::make($image)->save($location);

        $imageContentDetails = $request->only([
            'article_id',
            'article_content_id',
            // 'content',
        ]);
        $imageContentDetails['content'] = $img;
        return response()->json(
            [
                'status' => "success",
                'data' => $this->imageContentRepository->create($imageContentDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $imageContectId = $request->route('id');


        return response()->json([
            'data' => $this->imageContentRepository->getById($imageContectId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $imageContectId = $request->route('id');

        $find_id = ImageContent::where('id', $imageContectId)->first();
        if (File::exists('uploads/article_content/original_thumbnail/'.$find_id->content) && File::exists('uploads/article_content/thumbnail/'.$find_id->content)) {
            File::delete('uploads/article_content/original_thumbnail/'.$find_id->content);
            File::delete('uploads/article_content/thumbnail/'.$find_id->content);
        }

        $image = $request->file('content');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/article_content/original_thumbnail/' .$img);
        $thumbnail = public_path('uploads/article_content/thumbnail/' .$img);
        $imgFile = Image::make($image)->save($location);


        $imgFile->resize(296, 222, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($thumbnail);

        $textContentDetails = $request->only([
            'article_id',
            'article_content_id',
            // 'content',
        ]);
        $textContentDetails['content'] = $img;

        return response()->json([
            'status' => "success",
            'data' => $this->imageContentRepository->update($imageContectId, $textContentDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $imageContectId = $request->route('id');

        $find_id = ImageContent::where('id', $imageContectId)->first();
        if(!is_null($find_id))
    	{
    		if (File::exists('uploads/article_content/original_thumbnail/'.$find_id->content) && File::exists('uploads/article_content/thumbnail/'.$find_id->content)) {
                File::delete('uploads/article_content/original_thumbnail/'.$find_id->content);
                File::delete('uploads/article_content/thumbnail/'.$find_id->content);
            }
        }

        $this->imageContentRepository->delete($imageContectId);


        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response()->json([
            'status' => "success deleted",
        ]);
    }
    public function imageContentByArticleContentId(Request $request): JsonResponse
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->imageContentRepository->showImageContent($articleId)
        ]);
    }
}
