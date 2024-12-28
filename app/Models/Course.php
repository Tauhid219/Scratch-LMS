<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'category_id',
        'price',
        'discount_price',
        'status',
        'level',
        'language_id',
        'duration',
        'certificate',
        'rating',
        'enrollment_limit',
        'created_by',
        'live_class_enabled'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
