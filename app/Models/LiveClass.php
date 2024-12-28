<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'course_id',
        'description',
        'schedule',
        'duration',
        'platform',
        'meeting_link',
        'instructor_id',
        'language_id',
        'status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
