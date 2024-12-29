<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Language;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::with('course', 'language')->orderBy('order')->get();
        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $languages = Language::all();
        return view('admin.lessons.create', compact('courses', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:lessons,slug',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
            'resource_files.*' => 'nullable|file',
            'duration' => 'nullable|integer',
            'order' => 'required|integer',
            'course_id' => 'required|exists:courses,id',
            'language_id' => 'required|exists:languages,id',
        ]);

        $lesson = new Lesson();
        $lesson->title = $request->title;
        $lesson->slug = $request->slug ?: Str::slug($request->title);
        $lesson->content = $request->content;
        $lesson->video_url = $request->video_url;
        $lesson->resource_files = $request->hasFile('resource_files')
            ? json_encode(array_map(fn($file) => $file->store('resources', 'public'), $request->file('resource_files')))
            : null;
        $lesson->duration = $request->duration;
        $lesson->order = $request->order;
        $lesson->course_id = $request->course_id;
        $lesson->language_id = $request->language_id;
        $lesson->save();

        // return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');

        // Redirect to the parent course's show page
        return redirect()->route('courses.show', $lesson->course_id)
            ->with('success', 'Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return view('admin.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        $courses = Course::all();
        $languages = Language::all();
        return view('admin.lessons.edit', compact('lesson', 'courses', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:lessons,slug,' . $lesson->id,
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
            'resource_files.*' => 'nullable|file',
            'duration' => 'nullable|integer',
            'order' => 'required|integer',
            'course_id' => 'required|exists:courses,id',
            'language_id' => 'required|exists:languages,id',
        ]);

        $lesson->title = $request->title;
        $lesson->slug = $request->slug ?: Str::slug($request->title);
        $lesson->content = $request->content;
        $lesson->video_url = $request->video_url;
        $lesson->resource_files = $request->hasFile('resource_files')
            ? json_encode(array_map(fn($file) => $file->store('resources', 'public'), $request->file('resource_files')))
            : $lesson->resource_files;
        $lesson->duration = $request->duration;
        $lesson->order = $request->order;
        $lesson->course_id = $request->course_id;
        $lesson->language_id = $request->language_id;
        $lesson->save();

        // return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');

        // Redirect to the parent course's show page
        return redirect()->route('courses.show', $lesson->course_id)
            ->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        // return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully.');

        // Redirect to the parent course's show page
        return redirect()->route('courses.show', $lesson->course_id)
            ->with('success', 'Lesson deleted successfully.');
    }
}
