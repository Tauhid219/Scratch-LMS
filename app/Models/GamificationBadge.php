<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamificationBadge extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge_name',
        'description',
        'criteria',
        'icon'
    ];

    protected $casts = [
        'criteria' => 'array',
    ];
}
