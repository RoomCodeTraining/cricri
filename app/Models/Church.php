<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Church extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
         'name',
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
