<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTrueFalse extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quiz_id',
        'quiz_question_id',
        'text',
        'option_text',
        'is_correct',
        'marks',
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
    public function quizQuestion()
    {
        return $this->belongsTo(QuizQuestion::class, 'quiz_question_id');
    }
}
