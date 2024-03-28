<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'author_id', 'name', 'photo', 'content', 'upload_date', 'is_primary', 'slug', 'status', 'views'];
    protected $table = 'news';

    public $incrementing = false;
    public $keyType = 'char';

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the category that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the newsPhoto for the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsPhotos(): HasMany
    {
        return $this->hasMany(NewsPhoto::class);
    }

    /**
     * Get all of the comments for the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the newsHasLike for the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsHasLike(): HasMany
    {
        return $this->hasMany(NewsHasLike::class);
    }

    /**
     * Get all of the views for the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }



    public function newsTags(): HasMany
    {
        return $this->hasMany(NewsTag::class);
    }

    public function newsCategories(): HasMany
    {
        return $this->hasMany(NewsCategory::class);
    }

    public function newsSubCategories(): HasMany
    {
        return $this->hasMany(NewsSubCategory::class);
    }

    public function newsReports(): HasMany
    {
        return $this->hasMany(NewsReport::class);
    }
}
