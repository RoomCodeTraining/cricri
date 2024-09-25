<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasteur extends User
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'ordination_date',
        'ministry_experience',

    ];

    public function newQuery(): Builder
    {
        return parent::newQuery()->where('type', '=', 'user')->where('user_type', '=', 'pasteur');
    }

}
