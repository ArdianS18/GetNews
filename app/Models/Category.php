<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'slug'];
    protected $table = 'categories';

/**
 * Get all of the subCategory for the Category
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function subCategories(): HasMany
{
    return $this->hasMany(SubCategory::class);
}

/**
 * Get all of the news for the Category
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function news(): HasMany
{
    return $this->hasMany(News::class);
}

}
