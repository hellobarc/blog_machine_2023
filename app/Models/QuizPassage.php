<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizPassage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quiz_id',
        'title',
        'content',
    ];
}
