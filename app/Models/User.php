<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'name',
        'slug',
        'email',
        'password',
        'phone_number',
        'address',
        'photo',
        'birth_date',
        'email_verified_at'
    ];

    /**
     * Get the author associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(Author::class);
    }

    public function authors(): HasMany
    {
        return $this->hasMany(Author::class);
    }

    public function followers() : HasMany
    {
        return $this->hasMany(Followers::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $primaryKey = 'id';
    protected $table = 'users';

    public $incrementing = false;
    public $keyType = 'char';
}
