<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'active',
        'phone',
        'age',
        'image',
        'address',
        'country',
        'skill',
        'bio'
    ];

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
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * JWT - Get the identifier that will be stored in the token.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // usually the user's ID
    }

    /**
     * JWT - Return custom claims to be added to the token.
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * User has many services.
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
