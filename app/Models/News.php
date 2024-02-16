<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'photo', 'content', 'sinopsis', 'sub_kategoris_id', 'slug', 'watch', 'status', 'tags_id'];
    protected $table = ['news'];
}
