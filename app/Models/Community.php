<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;
class Community extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name',
        'sigle',
        'slug',
        'uuid',
        'description',
        'history',
        'location',
        'latitude',
        'longitude',
        'city_id',
        'municipality_id',
        'president_id'
    ];

        public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->slug = Str::slug($model->name);
        });
    }
    public function president():BelongsTo
    {
        return $this->belongsTo(President::class);
    }
    public function churches(): HasMany{

        return $this->hasMany(Church::class);
    }
    public function city(): BelongsTo{

        return $this->belongsTo(City::class);
    }
     public function municipality(): BelongsTo{

        return $this->belongsTo(Municipality::class);
    }


}
