<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'category_id',
        'slug',
        'meta_keyword',
        'meta_description',
        'page_title',
        'thumbnail',
        'custom_date',
        'author_id',
        'is_featured',
        'is_premium',
        'tags',
        'read_minutes',
        'references',
        'co_authors',
        'secondary_categories',
        'hits',
        'smily_yes',
        'smily_no',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function articleContent()
    {
        return $this->hasMany(ArticleContent::class, 'article_id');
    }
    public function articleTextContent()
    {
        return $this->hasMany(TextContent::class, 'article_id');
    }
    public function articleImageContent()
    {
        return $this->hasMany(ImageContent::class, 'article_id');
    }
    public function articleVideoContent()
    {
        return $this->hasMany(VideoContent::class, 'article_id');
    }

    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

    // public function getUpdatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

}
