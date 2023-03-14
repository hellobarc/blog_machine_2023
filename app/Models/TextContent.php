<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'article_id',
        'article_content_id',
        'content',
        'font',
        'font_size',
        'content_type',
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
