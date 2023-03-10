<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveArticleRequest;

use App\Interfaces\ArticleRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\ArticleResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\Article;

class ArticleController extends Controller
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository) 
    {
        $this->articleRepository = $articleRepository;
    }

    public function index(): JsonResponse 
    {
        $getData = $this->articleRepository->getAll();
        $allData = ArticleResource::collection($getData);
        return response()->json([
            'data' => $allData,
        ]);
    }

   
    public function store(SaveArticleRequest $request): JsonResponse 
    {
        $secondary_category_id =  [1,2,3];
        $image = $request->file('thumbnail');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/article/original_thumbnail/' .$img);
        $thumbnail = public_path('uploads/article/thumbnail/' .$img);
        $imgFile = Image::make($image)->save($location);


        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($thumbnail);

        $articleDetails = $request->only([
            'title',
            'category_id',
            'meta_keyword',
            'meta_description',
            'page_title',
            'custom_date',
            'author_id',
            'is_featured',
            'is_premium',
            'tags',
            'read_minutes',
            'references',
            'co_authors',
            // 'secondary_categories',
        ]);
        // $articleDetails['is_featured'] = 1;
        $articleDetails['slug'] = Str::slug($request->input('title') ,"-");
        $articleDetails['thumbnail'] = $img;
        $articleDetails['secondary_categories'] = json_encode($secondary_category_id);

        return response()->json(
            [
                'status' => "Success",
                'data' => $this->articleRepository->create($articleDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $catId = $request->route('id');

        return response()->json([
            'data' => $this->articleRepository->getById($catId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');
        $find_id = Article::where('id', $articleId)->first();
        if (File::exists('uploads/article/original_thumbnail/'.$find_id->thumbnail) && File::exists('uploads/article/thumbnail/'.$find_id->thumbnail)) {
            File::delete('uploads/article/original_thumbnail/'.$find_id->thumbnail);
            File::delete('uploads/article/thumbnail/'.$find_id->thumbnail);
        }

        $secondary_category_id =  [1,2,3];
        $image = $request->file('thumbnail');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/article/original_thumbnail/' .$img);
        $thumbnail = public_path('uploads/article/thumbnail/' .$img);
        $imgFile = Image::make($image)->save($location);


        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($thumbnail);

        $articleDetails = $request->only([
            'title',
            'category_id',
            'meta_keyword',
            'meta_description',
            'page_title',
            'custom_date',
            'author_id',
            'is_featured',
            'is_premium',
            'tags',
            'read_minutes',
            'references',
            'co_authors',
            'secondary_categories',
        ]);
        // $articleDetails['is_featured'] = '1';
        $articleDetails['slug'] = Str::slug($request->input('title') ,"-");
        $articleDetails['thumbnail'] = $img;
        $articleDetails['secondary_categories'] = json_encode($secondary_category_id);


        return response()->json([
            'status' => "Success",
            'data' => $this->articleRepository->update($articleId, $articleDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');
        $find_id = Article::where('id', $articleId)->first();
        if(!is_null($find_id))
    	{
    		if (File::exists('uploads/article/original_thumbnail/'.$find_id->thumbnail) && File::exists('uploads/article/thumbnail/'.$find_id->thumbnail)) {
                File::delete('uploads/article/original_thumbnail/'.$find_id->thumbnail);
                File::delete('uploads/article/thumbnail/'.$find_id->thumbnail);
            }
        }
        $this->articleRepository->delete($articleId);

        // return response()->json(null, Response::HTTP_NO_CONTENT);
        return response()->json([
            'status' => "success deleted",
        ]);
    }
}
