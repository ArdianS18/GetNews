<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'page', 'position', 'start_date', 'end_date', 'url', 'photo'];
    protected $table = 'advertisements';


    public function paymentAdvertisements(): HasMany
    {
        return $this->hasMany(PaymentAdvertisements::class);
    }
}
