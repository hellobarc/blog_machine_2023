<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'article_id',
        'ip_address',
        'unique_hits',
        'raw_hits',
        'staying_time',
        'country',
        'city',
    ];
}
