<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsTag extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'tag_id'];

    /**
     * Get the news that owns the NewsTag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    /**
     * Get the tag that owns the NewsTag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

}
