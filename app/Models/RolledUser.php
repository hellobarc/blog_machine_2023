<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolledUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','role_name','role_privilleges'];
}


