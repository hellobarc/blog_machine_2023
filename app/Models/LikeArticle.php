<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeArticle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'article_id',
        'likes',
       
    ];
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
