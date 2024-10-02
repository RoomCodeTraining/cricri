<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'uuid',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($municipality) {
            $municipality->uuid = Str::uuid();
            $municipality->slug = Str::slug($municipality->name);
        });
    }

    public function users()
    {
        return $this->hasMany(User::class, 'municipality_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
