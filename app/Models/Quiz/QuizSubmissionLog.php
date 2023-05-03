<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSubmissionLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'quiz_id',
    ];
}
