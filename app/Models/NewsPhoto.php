<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'multi_photo'];
    protected $table = 'news_photos';


    /**
     * Get the news that owns the NewsPhoto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
