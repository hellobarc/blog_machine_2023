<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizFillBlank extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quiz_id',
        'quiz_question_id',
        'text',
        'is_show',
        'blank_answer',
        'marks',
        'instruction',
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
