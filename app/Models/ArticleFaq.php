<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleFaq extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'article_id',
        'faq_question',
        'faq_answer',
    ];
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
