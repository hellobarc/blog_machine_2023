<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SaveRightTextVideo;
use App\Interfaces\RightTextVideoRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\{
    ArticleContent,
    RightTextVideo,
    Article,
};

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

    public function create()
    {
        $articles = Article::all();
        $articleContents = ArticleContent::all();
        $leftTextvideos = RightTextVideo::orderBy('id', 'DESC')->with('article', 'articleContent')->get();
        return view('admin.right-text-video.create-right-text-video', compact('articles', 'articleContents', 'leftTextvideos'));
    }

    public function store(SaveRightTextVideo $request)
    {
        $articleContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'content_title',
            'content_text',
            'video_url',
        ]);
        $storeData = $this->rightTextVideoRepository->create($articleContentDetails);
        return redirect()->route('admin.create.right-text-video')->with('success', 'Left Text Video Store Successfully.');
    }

    public function show(Request $request) 
    {
        $articleId = $request->route('id');

        $data = $this->rightTextVideoRepository->getById($articleId);
        $articles = Article::all();
        $articleContents = ArticleContent::all();
        return view('admin.right-text-video.edit-right-text-video', compact('data', 'articles', 'articleContents'));
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

        $update = $this->rightTextVideoRepository->update($articleId, $articleContentDetails);
    
        return redirect()->route('admin.create.right-text-video')->with('success', 'Left Text Video Update Successfully.');
    }

    public function destroy(Request $request) 
    {
        $articleId = $request->route('id');
       
        $this->rightTextVideoRepository->delete($articleId);
        return redirect()->route('admin.create.right-text-video')->with('success', 'Left Text Video Deleted Successfully.');
    }
}
