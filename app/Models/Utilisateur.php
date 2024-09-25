<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends User
{
    use HasFactory;
    protected $table = 'users';

    public function newQuery(): Builder
    {
        return parent::newQuery()->where('type', '=', 'user');
    }
}
