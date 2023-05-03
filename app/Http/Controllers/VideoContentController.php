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
use App\Models\{
                    TextContent,
                    VideoContent,
                    Article,
                    ArticleContent,
                };

class VideoContentController extends Controller
{
    private VideoContentRepositoryInterface $videoContentRepository;

    public function __construct(VideoContentRepositoryInterface $videoContentRepository) 
    {
        $this->videoContentRepository = $videoContentRepository;
    }

    public function index($article_content_id, $content)
    {
        $allData = $this->videoContentRepository->getAll($article_content_id);
        // $allData = CategoryResource::collection($getData);
        return view('admin.video-content.manage-video-content', compact('allData'));
    }

    public function create($article_content_id, $content_type)
    {
        $articles = Article::all();
       
        $articleContents = ArticleContent::where('id', $article_content_id)->get();
        
        return view('admin.video-content.create-video-content', compact('articles', 'articleContents'));
    }

    public function store(SaveVideoContentRequest $request)
    {
        $videoContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'video_title',
            'video_url',
        ]);

        $storeData = $this->videoContentRepository->create($videoContentDetails);
        return redirect()->route('admin.article-content')->with('success', 'Video Content Store Successfully.');
    }

    public function show(Request $request)
    {
        $videoContectId = $request->route('id');
        $data = $this->videoContentRepository->getById($videoContectId);
        $articles = Article::all();
        $articleContents = ArticleContent::all();
        return view('admin.video-content.edit-video-content', compact('data', 'articles', 'articleContents'));
    }

    public function update(Request $request)
    {
        $videoContectId = $request->route('id');
        
        $videoContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'video_title',
            'video_url',
        ]);
    
        $updateData = $this->videoContentRepository->update($videoContectId, $videoContentDetails);
        return redirect()->back()->with('success', 'Video Content Updated Successfully.');
    }

    public function destroy(Request $request)
    {
        $videoContectId = $request->route('id');
       
        $this->videoContentRepository->delete($videoContectId);


        return redirect()->back()->with('success', 'Video Content Deleted Successfully.');
    }
    public function videoContentByArticleContentId(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->videoContentRepository->showVideoContent($articleId)
        ]);
    }
}
