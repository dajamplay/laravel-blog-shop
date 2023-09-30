<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Exceptions\GeneralJsonException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

    public static function store($email, $password, $first_name, $last_name, $birthday = null)
    {

        $user = self::create([
            "email" => $email,
            "password" => $password,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "birthday" => $birthday ? strtotime($birthday) : null
        ]);

        if (!$user) {
            throw new GeneralJsonException(__("Ошибка создания пользователя."), 501);
        }

        return $user;
    }

    public function events() : HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function subscribesOnEvents() : BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}
