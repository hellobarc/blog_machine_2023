<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveTextContentRequest;

use App\Interfaces\TextContentRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\{
                    TextContent,
                    Article,
                    ArticleContent,
                };

class TextContentController extends Controller
{
    private TextContentRepositoryInterface $textContentRepository;

    public function __construct(TextContentRepositoryInterface $textContentRepository) 
    {
        $this->textContentRepository = $textContentRepository;
    }

    public function index($article_content_id, $content_type)
    {
        $allData = $this->textContentRepository->getAll($article_content_id);
        // $allData = CategoryResource::collection($getData);
        return view('admin.text-content.manage-text-content', compact('allData'));
    }
    public function create($article_content_id, $content_type)
    {
        $articles = Article::all();
        $articleContents = ArticleContent::where('id', $article_content_id)->get();
        $textContents = TextContent::orderBy('id', 'DESC')->with('article', 'articleContent')->get();
        return view('admin.text-content.create-text-content', compact('articles', 'articleContents', 'textContents', 'content_type'));
    }
    public function store(SaveTextContentRequest $request) 
    {
        
        $textContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'font',
            'font_size',
        ]);
       

        $content_type= $request->content_type;

    
        if($content_type == 'text' || $content_type == 'quote'){
            $textContentDetails['content'] = $request->content;
        }elseif($content_type == 'list-content'){
            $textContentDetails['content'] = json_encode($request->list_content);
        }elseif($content_type == 'subheadline'){
            $textContentDetails['content'] = $request->subheadline;
        }
        $textContentDetails['content_type'] = $content_type;
        $storeData = $this->textContentRepository->create($textContentDetails);
        //return redirect()->route('admin.create.text-content', $content_type)->with('success', 'Text Content Created Successfully.');
        return redirect()->route('admin.article-content')->with('success', 'Text Content Created Successfully.');
    }

    public function show(Request $request) 
    {
        $content_type = $request->route('content_type');
        $textContectId = $request->route('id');

        $data = $this->textContentRepository->getById($textContectId);
        $articles = Article::all();
        $articleContents = ArticleContent::all();
        return view('admin.text-content.edit-text-content', compact('data', 'articles', 'articleContents', 'content_type'));
    }

    public function update(Request $request) 
    {
        
        $textContectId = $request->route('id');
        
        $textContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'font',
            'font_size',
        ]);
        $content_type= $request->content_type;
        
        if($content_type == 'text' || $content_type == 'quote'){
            $textContentDetails['content'] = $request->content;
        }elseif($content_type == 'list-content'){
            $textContentDetails['content'] = json_encode($request->list_content);
        }elseif($content_type == 'subheadline'){
            $textContentDetails['content'] = $request->subheadline;
        }
        $textContentDetails['content_type'] = $content_type;
        $updateData = $this->textContentRepository->update($textContectId, $textContentDetails);
        return redirect()->back()->with('success', 'Text Content Update Successfully.');
    }

    public function destroy(Request $request) 
    {
        $textContectId = $request->route('id');
       
        $this->textContentRepository->delete($textContectId);

        return redirect()->back()->with('success', 'Text Content Deleted Successfully.');
    }
    public function textContentByArticleContentId(Request $request): JsonResponse 
    {
        $articleId = $request->route('id');

        return response()->json([
            'data' => $this->textContentRepository->showTextContent($articleId)
        ]);
    }
}
