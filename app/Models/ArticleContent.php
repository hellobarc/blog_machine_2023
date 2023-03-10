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
        // 'contact_name',
        'content_subtitle',
        'content_type',
        'layout',
        'layout_width'
    ];

}
