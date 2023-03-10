<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeftTextVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'article_content_id',
        'content_title',
        'content_text',
        'video_url',
    ];
}
