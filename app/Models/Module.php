<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'meta_keyword',
        'meta_description',
        'page_title',
    ];
}
