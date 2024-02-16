<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message'];
    protected $table = ['contact_us'];
}
