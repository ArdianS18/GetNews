<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * Get all of the newsTags for the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsTags(): HasMany
    {
        return $this->hasMany(NewsTag::class);
    }
}
