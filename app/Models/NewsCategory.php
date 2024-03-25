<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsCategory extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'category_id'];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
