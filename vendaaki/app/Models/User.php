<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone_number',
        'nif',
        'address',
        'postal_code',
        'city',
        'country',
        'profile_image_path',
        'profile_banner_path',
        'profile_description',
        'profile_theme_preference',
        'is_professional',
        'status',
        'last_login_at',
        'identity_document_path',
        // Campos verificados pelo sistema, não por input direto geralmente:
        // 'email_verified_at',
        // 'phone_verified_at',
        // 'identity_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'identity_document_path', // Esconder por default
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
            'password' => 'hashed',
            'phone_verified_at' => 'datetime',
            'is_professional' => 'boolean',
            'identity_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            // Para Enums, podemos usar Enum Casts no futuro se usarmos Enums PHP 8.1+
            // Por agora, string é suficiente ou podemos criar accessors/mutators se necessário.
            // 'profile_theme_preference' => ThemePreferenceEnum::class,
            // 'status' => UserStatusEnum::class,
        ];
    }
}
