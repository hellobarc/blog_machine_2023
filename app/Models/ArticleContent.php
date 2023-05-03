<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'article_id',
        'content_subtitle',
        'content_type',
        'layout',
        'layout_width'
    ];
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
    // public function textContent()
    // {
    //     return $this->hasMany(TextContent::class, 'article_content_id', 'id');
    // }

}
