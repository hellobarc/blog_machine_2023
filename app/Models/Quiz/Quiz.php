<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleContent;
use App\Models\Article;
class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'article_id',
        'article_content_id',
        'quiz_type',
        'title',
        'description',
        'question_type',
        'status',
    ];
    public function articleContent()
    {
        return $this->belongsTo(ArticleContent::class, 'article_content_id');
    }
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
