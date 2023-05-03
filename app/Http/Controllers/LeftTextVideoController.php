<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SaveLeftTextVideo;
use App\Interfaces\LeftTextVideoRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\{
                    ArticleContent,
                    LeftTextVideo,
                    Article,
                };

class LeftTextVideoController extends Controller
{
    private LeftTextVideoRepositoryInterface $leftTextVideoRepository;

    public function __construct(LeftTextVideoRepositoryInterface $leftTextVideoRepository) 
    {
        $this->leftTextVideoRepository = $leftTextVideoRepository;
    }

    public function index($article_content_id, $content_type)
    {
        $allData = $this->leftTextVideoRepository->getAll($article_content_id);
        // $allData = CategoryResource::collection($getData);
        return view('admin.left-text-video.manage-left-text-video', compact('allData'));
    }
    public function create()
    {
        $articles = Article::all();
       
        $articleContents = ArticleContent::all();
        $leftTextvideos = LeftTextVideo::orderBy('id', 'DESC')->with('article', 'articleContent')->get();
        return view('admin.left-text-video.create-left-text-video', compact('articles', 'articleContents', 'leftTextvideos'));
    }

    public function store(SaveleftTextVideo $request)
    {
        $articleContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'content_title',
            'content_text',
            'video_url',
        ]);
        $storeData = $this->leftTextVideoRepository->create($articleContentDetails);
        return redirect()->route('admin.create.left-text-video')->with('success', 'Left Text Video Store Successfully.');
    }

    public function show(Request $request) 
    {
        $articleId = $request->route('id');

        $data = $this->leftTextVideoRepository->getById($articleId);
        $articles = Article::all();
        $articleContents = ArticleContent::all();
        return view('admin.left-text-video.edit-left-text-video', compact('data', 'articles', 'articleContents'));
    }

    public function update(Request $request) 
    {
        $articleId = $request->route('id');
        
        $articleContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'content_title',
            'content_text',
            'video_url',
        ]);

        $update = $this->leftTextVideoRepository->update($articleId, $articleContentDetails);
    
        return redirect()->route('admin.create.left-text-video')->with('success', 'Left Text Video Update Successfully.');
    }

    public function destroy(Request $request) 
    {
        $articleId = $request->route('id');
       
        $this->leftTextVideoRepository->delete($articleId);
        return redirect()->route('admin.create.left-text-video')->with('success', 'Left Text Video Deleted Successfully.');
    }
}
