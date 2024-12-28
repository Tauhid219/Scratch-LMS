<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'video_url',
        'resource_files',
        'duration',
        'order',
        'course_id',
        'language_id'
    ];

    protected $casts = [
        'resource_files' => 'array',
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
