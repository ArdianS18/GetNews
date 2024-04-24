<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'page', 'start_date', 'end_date', 'url'];
    protected $table = 'advertisements';


    public function advertisement(): HasMany
    {
        return $this->hasMany(AdvertisementPhoto::class);
    }
}
