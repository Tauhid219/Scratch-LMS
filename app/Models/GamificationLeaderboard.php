<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamificationLeaderboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'points',
        'rank'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
