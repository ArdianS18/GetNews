<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'slug'];
    protected $table = 'sub_categories';

/**
 * Get the category that owns the SubCategory
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}

    /**
     * Get all of the comments for the SubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
