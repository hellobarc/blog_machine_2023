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
use App\Models\{
    Article,
    Category,
    Author,
    Tags,
    ArticleContent,
    AudioContent,
    VideoContent,
    RightTextVideo,
    LeftTextVideo,
    TextContent,
    ImageContent,
    HitCounter,
    Comment,
    LikeArticle,
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
        $tags = Tags::all();
        return view('admin.article.create-article', compact('categories', 'authors', 'tags'));
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
            'is_trending',
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
        $tags = Tags::all();
        return view('admin.article.edit-article', compact('data', 'categories', 'authors', 'tags'));
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
            'is_trending',
            'tags',
            'read_minutes',
            'references',
        ]);
        $articleDetails['slug'] = Str::slug($request->input('title') ,"-");
        $articleDetails['thumbnail'] = $img;
        $articleDetails['secondary_categories'] = json_encode($request->secondary_categories);
        $articleDetails['co_authors'] = json_encode($request->co_authors);

        $updateData = $this->articleRepository->update($articleId, $articleDetails);
        return redirect()->route('admin.article')->with('success', 'Article Update Successfully.');

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
        //delete article content
        $articleContent = ArticleContent::where('article_id', $articleId)->get();
        if($articleContent != NULL){
            foreach($articleContent as $rows){
                $contentType = $rows->content_type;
                $articleContentId = $rows->id;

                if($contentType == 'audio-content'){
                    $audioContent = AudioContent::where('article_content_id',$articleContentId)->first();
                    if(!is_null($audioContent))
                    {
                        if (File::exists('uploads/audio-content/'.$audioContent->audio)) {
                            File::delete('uploads/audio-content/'.$audioContent->audio);
                        }
                        $audioContent->delete();
                    }
                    
                }
                if($contentType == 'video-content'){
                    $videoContent = VideoContent::where('article_content_id',$articleContentId)->first();
                    if(!is_null($videoContent)){
                        $videoContent->delete();
                    }
                    
                }
                if($contentType == 'audio-content'){
                    $audioContent = AudioContent::where('article_content_id',$articleContentId)->first();
                    if(!is_null($audioContent)){
                        $audioContent->delete();
                    }
                    
                }
                if($contentType == 'right-text-video'){
                    $rightTextVideoContent = RightTextVideo::where('article_content_id',$articleContentId)->first();
                    
                    if(!is_null($rightTextVideoContent)){
                        $rightTextVideoContent->delete();
                    }
                }
                if($contentType == 'left-text-video'){
                    $leftTextVideoContent = LeftTextVideo::where('article_content_id',$articleContentId)->first();
                    if(!is_null($leftTextVideoContent)){
                        $leftTextVideoContent->delete();
                    }
                }
                if($contentType == 'text'){
                    $textContent = TextContent::where('article_content_id',$articleContentId)->first();
                    if(!is_null($textContent)){
                        $textContent->delete();
                    }
                }
                if($contentType == 'subheadline'){
                    $subHeadTextContent = TextContent::where('article_content_id',$articleContentId)->first();
                    if(!is_null($subHeadTextContent)){
                        $subHeadTextContent->delete();
                    }
                }
                if($contentType == 'list-content'){
                    $listTextContent = TextContent::where('article_content_id',$articleContentId)->first();
                    if(!is_null($listTextContent)){
                        $listTextContent->delete();
                    }
                }
                if($contentType == 'quote'){
                    $quoteTextContent = TextContent::where('article_content_id',$articleContentId)->first();
                    if(!is_null($quoteTextContent)){
                        $quoteTextContent->delete();
                    }
                }
                if($contentType == 'image'){
                    $imageContent = ImageContent::where('article_content_id',$articleContentId)->first();
                    if(!is_null($imageContent))
                    {
                        if (File::exists('uploads/image_content/'.$imageContent->image)) {
                            File::delete('uploads/image_content/'.$imageContent->image);
                        }
                        $imageContent->delete();
                    }
                    
                }

                $rows->delete();
            }
        }
        //delete quizzess
        $quizzess = Quiz::where('article_id', $articleId)->get();
        if(!empty($quizzess)){
            foreach($quizzess as $quiz){
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
        }
        //delete hit counter
        $hitCounter = HitCounter::where('article_id', $articleId)->get();
        foreach($hitCounter as $row){
            $row->delete();
        }
        //delete comment
        $comments = Comment::where('article_id', $articleId)->get();
        foreach($comments as $comment){
            $comment->delete();
        }
        //delete like
        $likes = LikeArticle::where('article_id', $articleId)->get();
        foreach($likes as $like){
            $like->delete();
        }
        $deleteData = $this->articleRepository->delete($articleId);
        return redirect()->route('admin.article')->with('success', 'Article Deleted Successfully.');
    }
}
