<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvertisementPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['advertisement_id', 'multi_photo'];
    protected $table = 'advertisements_photo';


    /**
     * Get the news that owns the NewsPhoto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function advertisement(): BelongsTo
    // {
    //     return $this->belongsTo(Advertisement::class);
    // }
}
