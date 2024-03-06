<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsHasLike extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'user_id', 'status'];
    protected $table = 'news_has_likes';
}
