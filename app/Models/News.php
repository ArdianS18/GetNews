<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'name', 'photo', 'content', 'sinopsis', 'upload_date', 'is_primary', 'category_id', 'sub_category_id', 'slug', 'status', 'views', 'tags'];
    protected $table = 'news';

    public $incrementing = false;
    public $keyType = 'char';

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
