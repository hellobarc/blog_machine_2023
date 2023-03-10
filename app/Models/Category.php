<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cat_name',
        'parent_id',
        'slug',
        'meta_keyword',
        'meta_description',
        'page_title',
        'thumbnail',
        'featured_image',
    ];


    public function categorySlug(){
        return  $this->cat_name . " eta category";
    }
}
