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
        'firstName',
        'lastName',
        'profile_photo_path',
        'type',
        'phone',
        'password_reset_required',
        'address',
        'city_id',
        'commune_id',
        'church_id',
        'user_type',
        'marital_status',
        'number_of_children'
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
        //return str_ends_with($this->email, '@findjesus.com') && $this->hasVerifiedEmail();
return true;
     }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->name = $user->firstName . ' ' . $user->lastName;
                $user->password = bcrypt('jesusfind@2024');
        });

        static::updating(function ($user) {
            $user->name = $user->firstName . ' ' . $user->lastName;
        });
    }

    public function church()
    {
        return $this->belongsTo(Church::class, 'church_id', 'id');
    }
     public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
     public function city()
    {
        return $this->belongsTo(City::class);
    }
}
