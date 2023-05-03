<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz\{
                        QuizMultipleChoice,
                        QuizDropDown,
                        QuizRadio,
                        QuizTrueFalse,
                        QuizFillBlank,
                    };
class QuizAddQuestionController extends Controller
{
    public function index($quiz_id, $question_type)
    {
        if($question_type == 'multiple_choice'){
            $questions = QuizMultipleChoice::where('quiz_id', $quiz_id)->with('quiz')->get();
        }elseif($question_type == 'drop_down'){
            $questions = QuizDropDown::where('quiz_id', $quiz_id)->with('quiz')->get();
        }elseif($question_type == 'radio'){
            $questions = QuizRadio::where('quiz_id', $quiz_id)->with('quiz')->get();
        }elseif($question_type == 'true_false_not_given'){
            $questions = QuizTrueFalse::where('quiz_id', $quiz_id)->with('quiz')->get();
        }elseif($question_type == 'fill_blank'){
            $questions = QuizFillBlank::where('quiz_id', $quiz_id)->with('quiz')->get();
        }
        return view('admin.quiz.add-question.manage-question', compact('quiz_id','question_type', 'questions'));
    }
    public function create($quiz_id, $question_type)
    {
        if($question_type == 'fill_blank'){
            return view('admin.quiz.add-question.create-fill-blank', compact('quiz_id','question_type'));
        }else{
            return view('admin.quiz.add-question.create-question', compact('quiz_id','question_type'));
        }
        
    }
    public function store(Request $request)
    {
        $input = $request->input();
        $quiz_id = $input['quiz_id'];
        $question_type = $input['question_type'];

        $text = $input['text'];
        $blank_answer = $input['blank_answer'];
        $is_correct = $input['is_correct'];
        $marks = $input['marks'];
        if($input['question_type'] == 'multiple_choice')
        {
            QuizMultipleChoice::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
                'marks' => $marks,
            ]);
        }elseif($input['question_type'] == 'drop_down'){
            QuizDropDown::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
                'marks' => $marks,
            ]);
        }elseif($input['question_type'] == 'radio'){
            QuizRadio::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
                'marks' => $marks,
            ]);
        }elseif($input['question_type'] == 'true_false_not_given'){
            QuizTrueFalse::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
                'marks' => $marks,
            ]);
        }
        return redirect()->back()->with('success', 'Question Added Successfully.');
    }
    public function destroy($id, $question_type)
    {
        if($question_type == 'multiple_choice'){
            QuizMultipleChoice::where('id', $id)->delete();
        }elseif($question_type == 'drop_down'){
            QuizDropDown::where('id', $id)->delete();
        }elseif($question_type == 'radio'){
            QuizRadio::where('id', $id)->delete();
        }elseif($question_type == 'true_false_not_given'){
            QuizTrueFalse::where('id', $id)->delete();
        }elseif($question_type == 'fill_blank'){
            QuizFillBlank::where('id', $id)->delete();
        } 
        return redirect()->route('admin.quiz')->with('success', 'Question Added Successfully.');
    }
    public function storeFillBlank(Request $request) 
    {
        $quiz_id = $request->quiz_id;
        $instruction = $request->instruction;
        $text = $request->text;
        $marks = $request->marks;
        $is_show = $request->is_show;
        $answer = explode(',', $request->blank_answer);
        

        QuizFillBlank::insert([
            'quiz_id' => $quiz_id,
            'text' => $text,
            'blank_answer' => json_encode($answer),
            'instruction' => $instruction,
            'marks' => $marks,
            'is_show' => $is_show,
        ]);
        return redirect()->route('admin.quiz')->with('success', 'Question Added Successfully.');

    }
}
