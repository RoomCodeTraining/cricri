<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;


class User extends Authenticatable implements HasMedia
{
    use InteractsWithMedia;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'profile_photo_path',
        'type',
        'phone',
        'password_reset_required',
        'address',
        'city_id',
        'municipality_id',
        'church_id',
        'user_type',
        'is_single',
        'date_of_birth',
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
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        //return $this->leadership_status;
return true;
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->name = $model->first_name . ' ' . $model->last_name;
            if (!isset($model->password)) {
                $model->password = bcrypt('jesusfind@2024');
            }
        });

        static::updating(function ($model) {
            $model->name = $model->first_name . ' ' . $model->last_name;
        });
    }

    public function church()
    {
        return $this->belongsTo(Church::class, 'church_id', 'id');
    }
     public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
     public function city()
    {
        return $this->belongsTo(City::class);
    }
}
