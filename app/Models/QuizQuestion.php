<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quiz_id',
        'question',
        'question_type',
        'marks',
        'time_limit',
        'status',
    ];
}
