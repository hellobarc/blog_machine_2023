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
    ];

}
