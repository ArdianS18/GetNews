<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id', 'type', 'page', 'position', 'start_date', 'end_date', 'url', 'photo', 'status'];
    protected $table = 'advertisements';

    public $incrementing = false;
    public $keyType = 'char';

    public function paymentAdvertisements(): HasMany
    {
        return $this->hasMany(PaymentAdvertisements::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
