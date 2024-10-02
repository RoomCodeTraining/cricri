<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Church extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
         'name',
         'uuid',
         'slug',
         'temple',
         'pastor_id',
         'contacts',
         'address',
         'email',
         'description',
         'latitude',
         'longitude',
         'website',
         'logo',
         'picture',
         'community_id',
         'sigle',
         'city_id',
         'municipality_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->slug = Str::slug($model->name);
        });
    }
    public function pastor():BelongsTo
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function community():BelongsTo
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }
    public function city(): BelongsTo{

        return $this->belongsTo(City::class);
    }
     public function municipality(): BelongsTo{

        return $this->belongsTo(Municipality::class);
    }
}
