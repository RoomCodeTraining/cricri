<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'commune_id',
    ];

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id', 'id');
    }
}
