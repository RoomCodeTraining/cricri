<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Community extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name',
        'sigle',
        'description',
        'history',
        'location',
        'latitude',
        'longitude',
        'city_id',
        'municipality_id',
        'president_id'
    ];

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
