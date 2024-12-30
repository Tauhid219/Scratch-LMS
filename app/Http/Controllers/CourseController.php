<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('super-admin')->get();  // Fetch only users with the 'super-admin' role
        $categories = Category::all();
        $languages = Language::all();

        return view('admin.courses.create', compact('users', 'categories', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:courses,slug|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'status' => 'nullable|in:Draft,Published,Archived',
            'level' => 'nullable|in:Beginner,Intermediate,Advanced',
            'language_id' => 'required|exists:languages,id',
            'duration' => 'nullable|integer',
            'certificate' => 'nullable|boolean',
            'rating' => 'nullable|numeric',
            'enrollment_limit' => 'nullable|integer',
            'created_by' => 'required|exists:users,id',
            'live_class_enabled' => 'nullable|boolean',
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            $thumbnail = null;
        }

        // Create the course
        Course::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'thumbnail' => $thumbnail,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'status' => $request->status ?? 'Draft',
            'level' => $request->level ?? 'Beginner',
            'language_id' => $request->language_id,
            'duration' => $request->duration,
            'certificate' => $request->certificate ?? false,
            'rating' => $request->rating,
            'enrollment_limit' => $request->enrollment_limit,
            'created_by' => $request->created_by,
            'live_class_enabled' => $request->live_class_enabled ?? false,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // return view('admin.courses.show', compact('course'));

        $course->load('lessons'); // Eager load lessons to optimize queries
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        $languages = Language::all();
        $users = User::role('super-admin')->get();

        return view('admin.courses.edit', compact('course', 'categories', 'languages', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug,' . $course->id,
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'status' => 'nullable|in:Draft,Published,Archived',
            'level' => 'nullable|in:Beginner,Intermediate,Advanced',
            'language_id' => 'required|exists:languages,id',
            'duration' => 'nullable|integer',
            'certificate' => 'nullable|boolean',
            'rating' => 'nullable|numeric',
            'enrollment_limit' => 'nullable|integer',
            'created_by' => 'required|exists:users,id',
            'live_class_enabled' => 'nullable|boolean',
        ]);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            $thumbnail = $course->thumbnail;  // Keep the existing thumbnail if no new file is uploaded
        }

        // Update the course
        $course->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'thumbnail' => $thumbnail,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'status' => $request->status ?? 'Draft',
            'level' => $request->level ?? 'Beginner',
            'language_id' => $request->language_id,
            'duration' => $request->duration,
            'certificate' => $request->certificate ?? false,
            'rating' => $request->rating,
            'enrollment_limit' => $request->enrollment_limit,
            'created_by' => $request->created_by,
            'live_class_enabled' => $request->live_class_enabled ?? false,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
