<?php

namespace App\Models;

use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasTenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasTeams;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use TomatoPHP\FilamentLanguageSwitcher\Traits\InteractsWithLanguages;
use TomatoPHP\FilamentMeta\Traits\HasMeta;
use TomatoPHP\FilamentSaasPanel\Traits\InteractsWithTenant;

/**
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $loginBy
 * @property string $type
 * @property string $address
 * @property string $password
 * @property string $otp_code
 * @property string $otp_activated_at
 * @property string $last_login
 * @property string $agent
 * @property string $host
 * @property int $attempts
 * @property bool $login
 * @property bool $activated
 * @property bool $blocked
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class Account extends Authenticatable implements HasAvatar, HasMedia, HasTenants
{
    use HasFactory;
    use InteractsWithMedia;
    use Notifiable;
    use SoftDeletes;
    use HasTeams;
    use InteractsWithTenant;
    use InteractsWithLanguages;
    use HasMeta;

    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'phone',
        'parent_id',
        'type',
        'name',
        'username',
        'loginBy',
        'address',
        'password',
        'otp_code',
        'otp_activated_at',
        'last_login',
        'agent',
        'host',
        'is_login',
        'is_active',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_login' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
        'otp_activated_at',
        'last_login',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp_code',
        'otp_activated_at',
        'host',
        'agent',
    ];

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->getFirstMediaUrl('avatar') ?? null;
    }
}
