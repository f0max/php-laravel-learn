<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    public const string FIELD_USERNAME = 'username';
    public const string FIELD_EMAIL = 'email';
    public const string FIELD_LAST_NAME = 'last_name';
    public const string FIELD_FIRST_NAME = 'first_name';
    public const string FIELD_GENDER = 'gender';
    public const string FIELD_PASSWORD = 'password';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        self::FIELD_USERNAME,
        self::FIELD_EMAIL,
        self::FIELD_LAST_NAME,
        self::FIELD_FIRST_NAME,
        self::FIELD_GENDER,
        self::FIELD_PASSWORD,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        self::FIELD_PASSWORD,
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            self::FIELD_PASSWORD => 'hashed',
        ];
    }
}
