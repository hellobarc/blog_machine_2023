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
use App\Models\{
                    ImageContent,
                    Article,
                    ArticleContent,
                };

class ImageContentController extends Controller
{
    private ImageContentRepositoryInterface $imageContentRepository;

    public function __construct(ImageContentRepositoryInterface $imageContentRepository)
    {
        $this->imageContentRepository = $imageContentRepository;
    }

    public function index($article_content_id, $content_type)
    {
        $allData = $this->imageContentRepository->getAll($article_content_id);
        // $allData = CategoryResource::collection($getData);
        return view('admin.image-content.manage-image-content', compact('allData'));
    }
    public function create($article_content_id)
    {
        $articles = Article::all();
        $articleContents = ArticleContent::where('id', $article_content_id)->get();
        $imageContents = ImageContent::orderBy('id', 'DESC')->with('article', 'articleContent')->get();
        return view('admin.image-content.create-image-content', compact('articles', 'articleContents', 'imageContents'));
    }

    public function store(SaveImageContentRequest $request)
    {
        $image = $request->file('image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $featured_path = 'uploads/image_content/' .$img;
        $location = public_path($featured_path);

        $imgFile = Image::make($image)->save($location);

        $imageContentDetails = $request->only([
            'article_id',
            'article_content_id',
            
        ]);
        $imageContentDetails['image'] = $img;
        $storeData = $this->imageContentRepository->create($imageContentDetails);
        return redirect()->route('admin.article-content')->with('success', 'Image Content Created Successfully.');
    }

    public function show(Request $request)
    {
        $imageContectId = $request->route('id');

        $data = $this->imageContentRepository->getById($imageContectId);
        $articles = Article::all();
        $articleContents = ArticleContent::all();
        return view('admin.image-content.edit-image-content', compact('data', 'articles', 'articleContents'));
    }

    public function update(Request $request)
    {
        $imageContectId = $request->route('id');

        $find_id = ImageContent::where('id', $imageContectId)->first();
        if ( File::exists('uploads/image_content/'.$find_id->image)) {
            File::delete('uploads/image_content/'.$find_id->image);
        }

        $image = $request->file('image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/image_content/' .$img);
        $thumbnail = public_path('uploads/image_content/' .$img);
        $imgFile = Image::make($image)->save($location);


        $imgFile->resize(296, 222, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($thumbnail);

        $textContentDetails = $request->only([
            'article_id',
            'article_content_id',
        ]);
        $textContentDetails['image'] = $img;

        $data = $this->imageContentRepository->update($imageContectId, $textContentDetails);
        return redirect()->back()->with('success', 'Image Content Update Successfully.');
    }

    public function destroy(Request $request)
    {
        $imageContectId = $request->route('id');

        $find_id = ImageContent::where('id', $imageContectId)->first();
        if(!is_null($find_id))
    	{
    		if (File::exists('uploads/image_content/'.$find_id->image)) {
                File::delete('uploads/image_content/'.$find_id->image);
            }
        }

        $this->imageContentRepository->delete($imageContectId);

        return redirect()->back()->with('success', 'Image Content Deleted Successfully.');
    }
    public function imageContentByArticleContentId(Request $request): JsonResponse
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->imageContentRepository->showImageContent($articleId)
        ]);
    }
}
