<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name'];
    protected $table = 'sub_categories';

    /**
     * Get all of the Category for the SubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Categorys(): HasMany
    {
        return $this->hasMany(Category::class, 'foreign_key', 'local_key');
    }

}
