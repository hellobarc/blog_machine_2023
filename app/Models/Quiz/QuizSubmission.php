<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSubmission extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quiz_submission_log_id',
        'quiz_content_id',
        // 'quiz_id',
        'question_id',
        'question_type',
        'quiz_type',
        'answered_text',
        'is_correct',
        'obtained_marks',
        'submitted_ans',
    ];
}
