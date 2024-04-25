<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentAdvertisements extends Model
{
    use HasFactory;

    protected $fillable = ['advertisement_id', 'payment_method', 'voucher'];
    protected $table = 'payment_advertisements';
    
    /**
     * Get the advertisement that owns the PaymentAdvertisements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertisement(): BelongsTo
    {
        return $this->belongsTo(Advertisement::class);
    }
}
