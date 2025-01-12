<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        // Courses এর তথ্য সংগ্রহ
        $courses = Course::with('category')  // Category এর নাম নিতে for eager loading
            ->select('title', 'thumbnail', 'category_id', 'price')  // প্রয়োজনীয় ফিল্ডগুলি নির্বাচন
            ->get();

        // Home পেইজে ডেটা পাঠানো
        return view('frontend.home', compact('courses'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function olympiad()
    {
        return view('frontend.olympiad');
    }
}
