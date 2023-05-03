<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'article_id',
        'user_id',
        'comment',
        'status',
        'type',
        'reply_comment_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function article(){
        return $this->belongsTo(Article::class,'article_id');
    }
}
