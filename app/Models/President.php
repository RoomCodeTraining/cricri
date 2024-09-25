<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class President extends User
{
    use HasFactory;

    
    protected $table = 'users';

    protected $fillable = [
        'leadership_start_date',
        'leadership_status',
        'pastoral_experience',
        'community_id'
    ];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
    public function newQuery(): Builder
    {
        return parent::newQuery()->where('type', '=', 'user')->where('user_type', '=', 'president');
    }
}
