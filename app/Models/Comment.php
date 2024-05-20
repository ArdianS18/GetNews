<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content','news_id', 'parent_id'];
    protected $table = 'comments';


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * Get all of the commentReports for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentReports(): HasMany
    {
        return $this->hasMany(CommentReport::class);
    }

    /**
     * Get the User that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the News that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
