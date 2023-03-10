<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveCategoryRequest;

use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\Category;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): JsonResponse
    {
        $getData = $this->categoryRepository->getAll();
        $allData = CategoryResource::collection($getData);
        return response()->json([
            'data' => $allData,
        ]);
    }

    public function store(SaveCategoryRequest $request): JsonResponse
    {
        $image = $request->file('featured_image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $featured_path = 'uploads/category/featured/' .$img;
        $location = public_path($featured_path);
        $thumbnail_path = 'uploads/category/thumbnail/' .$img;
        $thumbnail = public_path($thumbnail_path );
        $imgFile = Image::make($image)->save($location);


        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($thumbnail);

        $orderDetails = $request->only([
            'cat_name',
            'parent_id',
            'meta_keyword',
            'meta_description',
            'page_title',
        ]);
        $orderDetails['slug'] = Str::slug($request->input('cat_name') ,"-");
        $orderDetails['featured_image'] =  $featured_path;
        $orderDetails['thumbnail'] = $thumbnail_path;

        return response()->json(
            [
                'status' => "success",
                'data' => $this->categoryRepository->create($orderDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $catId = $request->route('id');

        return response()->json([
            'data' => $this->categoryRepository->getById($catId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $catId = $request->route('id');
        $find_id = Category::where('id', $catId)->first();
        if (File::exists('uploads/category/featured/'.$find_id->featured_image) && File::exists('uploads/category/thumbnail/'.$find_id->thumbnail)) {
            File::delete('uploads/category/featured/'.$find_id->featured_image);
            File::delete('uploads/category/thumbnail/'.$find_id->thumbnail);
        }
        $image = $request->file('featured_image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $featured_path = 'uploads/category/featured/' .$img;
        $location = public_path($featured_path);
        $thumbnail_path = 'uploads/category/thumbnail/' .$img;
        $thumbnail = public_path($thumbnail_path );
        $imgFile = Image::make($image)->save($location);


        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($thumbnail);
        $categoryDetails = $request->only([
            'cat_name',
            'parent_id',
            'meta_keyword',
            'meta_description',
            'page_title',
        ]);
        $orderDetails['slug'] = Str::slug($request->input('cat_name') ,"-");
        $orderDetails['featured_image'] =  $featured_path;
        $orderDetails['thumbnail'] = $thumbnail_path;

        return response()->json([
            'status' => "success",
            'data' => $this->categoryRepository->update($catId, $categoryDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $catId = $request->route('id');
        $find_id = Category::where('id', $catId)->first();
        $featured_path = $find_id->featured_image;

        $thumbnail_path = $find_id->thumbnail;
        if(!is_null($find_id))
    	{
    		if (File::exists($featured_path) && File::exists($thumbnail_path)) {
                unlink($featured_path);
                unlink($thumbnail_path);
            }
        }
        $this->categoryRepository->delete($catId);


        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response()->json([
            'status' => "success deleted",
        ]);
    }
}
