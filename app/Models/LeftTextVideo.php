<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeftTextVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'article_id',
        'article_content_id',
        'content_title',
        'content_text',
        'video_url',
    ];
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
    public function articleContent()
    {
        return $this->belongsTo(ArticleContent::class, 'article_content_id');
    }
}
