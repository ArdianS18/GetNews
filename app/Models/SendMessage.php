<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SendMessage extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id', 'email', 'message', 'status_delete'];
    protected $table = 'send_messages';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
