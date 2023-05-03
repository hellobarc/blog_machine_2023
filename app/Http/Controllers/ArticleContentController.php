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
use App\Models\{
    Article,
    AudioContent,
    VideoContent,
    RightTextVideo,
    LeftTextVideo,
    TextContent,
    ImageContent,
};
use App\Models\Quiz\{
    Quiz,
    QuizQuestion,
    QuizMultipleChoice,
    QuizTrueFalse,
    QuizRadio,
    QuizDropDown,
    QuizFillBlank,
};

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
        $contentType = $request->route('content_type');
        if($contentType == 'audio-content'){
            $audioContent = AudioContent::where('article_content_id',$articleId)->first();
            if(!is_null($audioContent))
    	    {
                if (File::exists('uploads/audio-content/'.$audioContent->audio)) {
                    File::delete('uploads/audio-content/'.$audioContent->audio);
                }
                $audioContent->delete();
            }
            
        }
        if($contentType == 'video-content'){
            $videoContent = VideoContent::where('article_content_id',$articleId)->first();
            if(!is_null($videoContent)){
                $videoContent->delete();
            }
            
        }
        if($contentType == 'audio-content'){
            $audioContent = AudioContent::where('article_content_id',$articleId)->first();
            if(!is_null($audioContent)){
                $audioContent->delete();
            }
            
        }
        if($contentType == 'right-text-video'){
            $rightTextVideoContent = RightTextVideo::where('article_content_id',$articleId)->first();
            
            if(!is_null($rightTextVideoContent)){
                $rightTextVideoContent->delete();
            }
        }
        if($contentType == 'left-text-video'){
            $leftTextVideoContent = LeftTextVideo::where('article_content_id',$articleId)->first();
            if(!is_null($leftTextVideoContent)){
                $leftTextVideoContent->delete();
            }
        }
        if($contentType == 'text'){
            $textContent = TextContent::where('article_content_id',$articleId)->first();
            if(!is_null($textContent)){
                $textContent->delete();
            }
        }
        if($contentType == 'subheadline'){
            $subHeadTextContent = TextContent::where('article_content_id',$articleId)->first();
            if(!is_null($subHeadTextContent)){
                $subHeadTextContent->delete();
            }
        }
        if($contentType == 'list-content'){
            $listTextContent = TextContent::where('article_content_id',$articleId)->first();
            if(!is_null($listTextContent)){
                $listTextContent->delete();
            }
        }
        if($contentType == 'quote'){
            $quoteTextContent = TextContent::where('article_content_id',$articleId)->first();
            if(!is_null($quoteTextContent)){
                $quoteTextContent->delete();
            }
        }
        if($contentType == 'image'){
            $imageContent = ImageContent::where('article_content_id',$articleId)->first();
            if(!is_null($imageContent))
            {
                if (File::exists('uploads/image_content/'.$imageContent->image)) {
                    File::delete('uploads/image_content/'.$imageContent->image);
                }
                $imageContent->delete();
            }  
        }

        //delete quiz
        $quiz = Quiz::where('article_content_id', $articleId)->first();
        if(!empty($quiz)){
            $quizType = $quiz->quiz_type;
            $quizId = $quiz->id;
            if($quizType == 'general'){
                $questionType = $quiz->question_type;
                if($questionType == 'multiple_choice'){
                    $multipleChoice = QuizMultipleChoice::where('quiz_id', $quizId)->get();
                    if(!is_null($multipleChoice)){
                        foreach($multipleChoice as $row){
                            $row->delete();
                        }
                    }
                }elseif($questionType == 'drop_down'){
                    $dropDown = QuizDropDown::where('quiz_id', $quizId)->get();
                    if(!is_null($dropDown)){
                        foreach($dropDown as $row){
                            $row->delete();
                        }
                    }
                }elseif($questionType == 'radio'){
                    $radio = QuizRadio::where('quiz_id', $quizId)->get();
                    if(!is_null($radio)){
                        foreach($radio as $row){
                            $row->delete();
                        }
                    }
                }elseif($questionType == 'fill_blank'){
                    $fillBlank = QuizFillBlank::where('quiz_id', $quizId)->get();
                    if(!is_null($fillBlank)){
                        foreach($fillBlank as $row){
                            $row->delete();
                        }
                    }
                }elseif($questionType == 'true_false_not_given'){
                    $trueFalse = QuizTrueFalse::where('quiz_id', $quizId)->get();
                    if(!is_null($trueFalse)){
                        foreach($trueFalse as $row){
                            $row->delete();
                        }
                    }
                }
            }
            $quiz->delete();
            
        }
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
