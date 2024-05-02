<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentNews extends Model
{
    use HasFactory;

    protected $fillable = ['payment_method', 'voucher'];
    protected $table = 'payment_news';

    /**
     * Get the advertisement that owns the PaymentAdvertisements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news() : HasMany
    {
        return $this->hasMany(News::class);
    }
}
