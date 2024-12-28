<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'course_id',
        'questions',
        'max_score',
        'passing_score',
        'time_limit',
        'language_id'
    ];

    protected $casts = [
        'questions' => 'array',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
