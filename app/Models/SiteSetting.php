<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = ['logo_file','homepage_title','homepage_description','site_email','featured_post_count','pagination_post_count'];
}
