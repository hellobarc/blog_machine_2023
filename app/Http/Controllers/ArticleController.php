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
use App\Models\Category;
use App\Models\Author;

class ArticleController extends Controller
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository) 
    {
        $this->articleRepository = $articleRepository;
    }

    public function index() 
    {
        $getData = $this->articleRepository->getAll();
        $allData = ArticleResource::collection($getData);
        return view('admin.article.manage-article', compact('allData'));
    }
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.article.create-article', compact('categories', 'authors'));
    }
   
    public function store(SaveArticleRequest $request) 
    {
        $image = $request->file('thumbnail');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/article/thumbnail/' .$img);
        $imgFile = Image::make($image)->save($location);

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
        ]);
        $articleDetails['slug'] = Str::slug($request->input('title') ,"-");
        $articleDetails['thumbnail'] = $img;
        $articleDetails['secondary_categories'] = json_encode($request->secondary_categories);
        $articleDetails['co_authors'] = json_encode($request->co_authors);

        $storeData = $this->articleRepository->create($articleDetails);
        return redirect()->route('admin.article')->with('success', 'Article Created Successfully.');
    }

    public function show(Request $request) 
    {
        $catId = $request->route('id');
        $data = $this->articleRepository->getById($catId);
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.article.edit-article', compact('data', 'categories', 'authors'));
    }

    public function update(Request $request) 
    {
        $articleId = $request->route('id');
        $find_id = Article::where('id', $articleId)->first();
        if (File::exists('uploads/article/thumbnail/'.$find_id->thumbnail)) {
            File::delete('uploads/article/thumbnail/'.$find_id->thumbnail);
        }

        $image = $request->file('thumbnail');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/article/thumbnail/' .$img);
        $imgFile = Image::make($image)->save($location);

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
        ]);
        $articleDetails['slug'] = Str::slug($request->input('title') ,"-");
        $articleDetails['thumbnail'] = $img;
        $articleDetails['secondary_categories'] = json_encode($request->secondary_categories);
        $articleDetails['co_authors'] = json_encode($request->co_authors);

        $updateData = $this->articleRepository->update($articleId, $articleDetails);
        

    }

    public function destroy(Request $request) 
    {
        $articleId = $request->route('id');
        $find_id = Article::where('id', $articleId)->first();
        if(!is_null($find_id))
    	{
    		if (File::exists('uploads/article/thumbnail/'.$find_id->thumbnail)) {
                File::delete('uploads/article/thumbnail/'.$find_id->thumbnail);
            }
        }
        $deleteData = $this->articleRepository->delete($articleId);
        return redirect()->route('admin.article')->with('success', 'Article Deleted Successfully.');
    }
}
