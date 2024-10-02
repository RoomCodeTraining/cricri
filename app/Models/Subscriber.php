<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email','uuid'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->uuid = Str::uuid();
        });
    }
}
