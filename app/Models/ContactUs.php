<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'status_delete'];
    protected $table = 'contact_us';

    /**
     * Get the user that owns the ContactUs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
