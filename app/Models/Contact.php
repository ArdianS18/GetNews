<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'slogan', 'email', 'phone_number', 'address', 'url_facebook', 'url_twitter', 'url_instagram', 'url_linkedin'];
    protected $table = 'contacts';
}
