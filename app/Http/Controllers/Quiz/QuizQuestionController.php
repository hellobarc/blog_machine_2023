<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Quiz\SaveQuizQuestionRequest;
use App\Interfaces\Quiz\QuizQuestionRepositoryInterface;
use App\Http\Resources\Quiz\QuizQuestionResource;
use Illuminate\Support\Str;

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

class QuizQuestionController extends Controller
{
    private QuizQuestionRepositoryInterface $quizQuestionRepository;

    public function __construct(QuizQuestionRepositoryInterface $quizQuestionRepository) 
    {
        $this->quizQuestionRepository = $quizQuestionRepository;
    }

    public function index() 
    {
        $getData = $this->quizQuestionRepository->getAll();
        $allData = QuizQuestionResource::collection($getData);
        return view('admin.quiz.quiz-question.manage-quiz-question', compact('allData'));
    }
    public function create()
    {
        $quizzes = Quiz::all();
        return view('admin.quiz.quiz-question.create-quiz-question', compact('quizzes'));
    }
    public function store(SaveQuizQuestionRequest $request) 
    {
        $quizQuestionDetails = $request->only([
            'quiz_id',
            'question',
            'question_type',
            'status',
        ]);
        
        $storeData = $this->quizQuestionRepository->create($quizQuestionDetails);
        return redirect()->route('admin.quiz-question')->with('success', 'Quiz Question Created Successfully.');
    }

    public function show(Request $request) 
    {
        $quizQuestionId = $request->route('id');
        $data = $this->quizQuestionRepository->getById($quizQuestionId);
        $quizzes = Quiz::all();
        return view('admin.quiz.quiz-question.edit-quiz-question', compact('data', 'quizzes'));
    }

    public function update(Request $request) 
    {
        $quizQuestionId = $request->route('id');
        
        $quizQuestionDetails = $request->only([
            'quiz_id',
            'question',
            'question_type',
            'status',
        ]);

        $update = $this->quizQuestionRepository->update($quizQuestionId, $quizQuestionDetails);

        return redirect()->route('admin.quiz-question')->with('success', 'Quiz Question Update Successfully.');
    }

    public function destroy(Request $request) 
    {
        $quizQuestionId = $request->route('id');
        $questionType = $request->route('question_type');

        //     if($questionType == 'multipe_choice'){
        //         $multipleChoice = QuizMultipleChoice::where('quiz_question_id',$questionId)->first();
        //         $multipleChoice->delete();
        //     }
        //     if($questionType == 'true_false_not_given'){
        //         $trueFalse = QuizTrueFalse::where('quiz_question_id',$questionId)->first();
        //         $trueFalse->delete();
        //     }
        //     if($questionType == 'fill_blank'){
        //         $fillBlank = QuizFillBlank::where('quiz_question_id',$questionId)->first();
        //         $fillBlank->delete();
        //     }
        //     if($questionType == 'drop_down'){
        //         $dropDown = QuizDropDown::where('quiz_question_id',$questionId)->first();
        //         $dropDown->delete();
        //     }
        //     if($questionType == 'radio'){
        //         $radio = QuizRadio::where('quiz_question_id',$questionId)->first();
        //         $radio->delete();
        //     }
        
        $this->quizQuestionRepository->delete($quizQuestionId);

        return redirect()->route('admin.quiz-question')->with('success', 'Quiz Question delete Successfully.');
    }
}
