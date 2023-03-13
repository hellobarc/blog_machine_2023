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
use App\Models\Article;

class ArticleContentController extends Controller
{
    private ArticleContentRepositoryInterface $articleContentRepository;

    public function __construct(ArticleContentRepositoryInterface $articleContentRepository) 
    {
        $this->articleContentRepository = $articleContentRepository;
    }

    public function index() 
    {
        $getData = $this->articleContentRepository->getAll();
        $allData = CategoryResource::collection($getData);
        return view('admin.article-content.manage-article-content', compact('allData'));
    }
    public function create()
    {
        $articles = Article::all();
        return view('admin.article-content.create-article-content', compact('articles'));
    }
    public function store(SaveArticleContentRequest $request) 
    {
        $articleContentDetails = $request->only([
            'article_id',
            'content_subtitle',
            'content_type',
            'layout',
            'layout_width',
        ]);
        
        $storeData = $this->articleContentRepository->create($articleContentDetails);
        return redirect()->route('admin.article-content')->with('success', 'Article Content Created Successfully.');
    }

    public function show(Request $request) 
    {
        $articleId = $request->route('id');
        $data = $this->articleContentRepository->getById($articleId);
        $articles = Article::all();
        return view('admin.article-content.edit-article-content', compact('data', 'articles'));
    }

    public function update(Request $request) 
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

        return redirect()->route('admin.article-content')->with('success', 'Article Content Update Successfully.');
    }

    public function destroy(Request $request) 
    {
        $articleId = $request->route('id');
       
        $this->articleContentRepository->delete($articleId);

        return redirect()->route('admin.article-content')->with('success', 'Article Content delete Successfully.');
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
