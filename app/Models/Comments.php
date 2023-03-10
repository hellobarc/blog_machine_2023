<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
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
}
