<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Quiz\SaveQuizRequest;

use App\Interfaces\Quiz\QuizRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\Quiz\QuizResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\Quiz\{
                        Quiz,
                        QuizQuestion,
                        QuizMultipleChoice,
                        QuizTrueFalse,
                        QuizRadio,
                        QuizDropDown,
                        QuizFillBlank,
                    };
use App\Models\ArticleContent;
use App\Models\Article;

class QuizController extends Controller
{
    private QuizRepositoryInterface $quizRepository;

    public function __construct(QuizRepositoryInterface $quizRepository) 
    {
        $this->quizRepository = $quizRepository;
    }

    public function index() 
    {
        $getData = $this->quizRepository->getAll();
        $allData = QuizResource::collection($getData);
        return view('admin.quiz.manage-quiz', compact('allData'));
    }
    public function create($article_id)
    {
        $articleContents = ArticleContent::where('article_id', $article_id)->get();
        return view('admin.quiz.create-quiz', compact('articleContents', 'article_id'));
    }
    public function createArticle()
    {
        $articles = Article::all();
        return view('admin.quiz.create-article-quiz', compact('articles'));
    }
    public function store(SaveQuizRequest $request) 
    {
        $quizDetails = $request->only([
            'article_id',
            'article_content_id',
            'quiz_type',
            'title',
            'description',
            'question_type',
            'status',
        ]);
        
        $storeData = $this->quizRepository->create($quizDetails);
        return redirect()->route('admin.quiz')->with('success', 'Quiz Created Successfully.');
    }

    public function show(Request $request) 
    {
        $quizId = $request->route('id');
        $article_id = $request->route('article_id');
        $data = $this->quizRepository->getById($quizId);
        $articleContents = ArticleContent::all();
        return view('admin.quiz.edit-quiz', compact('data', 'articleContents', 'article_id'));
    }

    public function update(Request $request) 
    {
        $quizId = $request->route('id');
        
        $quizDetails = $request->only([
            'article_id',
            'article_content_id',
            'quiz_type',
            'title',
            'description',
            'question_type',
            'status',
        ]);

        $update = $this->quizRepository->update($quizId, $quizDetails);

        return redirect()->route('admin.quiz')->with('success', 'Quiz Update Successfully.');
    }

    public function destroy(Request $request) 
    {
        $quizId = $request->route('id');
        $quizType = $request->route('quiz_type');
        $questionType = $request->route('question_type');
        if($quizType == 'general'){
            if($questionType == 'multipe_choice'){
                $multipleChoice = QuizMultipleChoice::where('quiz_id',$quizId)->first();
                $multipleChoice->delete();
            }
            if($questionType == 'true_false_not_given'){
                $trueFalse = QuizTrueFalse::where('quiz_id',$quizId)->first();
                $trueFalse->delete();
            }
            if($questionType == 'fill_blank'){
                $fillBlank = QuizFillBlank::where('quiz_id',$quizId)->first();
                $fillBlank->delete();
            }
            if($questionType == 'drop_down'){
                $dropDown = QuizDropDown::where('quiz_id',$quizId)->first();
                $dropDown->delete();
            }
            if($questionType == 'radio'){
                $radio = QuizRadio::where('quiz_id',$quizId)->first();
                $radio->delete();
            }
        }
        
        $this->quizRepository->delete($quizId);

        return redirect()->route('admin.quiz')->with('success', 'Quiz delete Successfully.');
    }
    
}
