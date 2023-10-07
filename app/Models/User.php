<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'registered_at',
        'birthday',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'registered_at' => 'datetime',
        'birthday' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeWithoutAdmins(Builder $query) : Builder
    {
        //return $query->where('role', '!=', 'admin');
        return $query->whereRole('user');
    }

    public function isAdmin() : bool
    {
        return $this->role === 'admin';
    }
}
