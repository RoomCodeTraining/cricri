<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uuid',
        'slug',
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->slug = Str::slug($model->name);
        });
    }
    public function users()
    {
        return $this->hasMany(User::class, 'city_id');
    }
}
