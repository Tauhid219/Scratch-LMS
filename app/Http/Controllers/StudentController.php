<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch courses from the database
        $courses = Course::all(); // Adjust query as needed (e.g., pagination or filters)

        // Pass courses to the view
        return view('admin.students.courseList', compact('courses'));
    }

    // Handle enrollment and redirect to course details
    public function enroll($id)
    {
        $course = Course::findOrFail($id);
        $user = Auth::user();

        // Check if already enrolled
        $enrollment = Enrollment::firstOrCreate(
            ['student_id' => $user->id, 'course_id' => $course->id],
            ['enrollment_date' => now(), 'status' => 'Active', 'progress' => 0]
        );

        return redirect()->route('courses.show', $course->id)
            ->with('success', 'You are now enrolled in the course.');
    }

    // Show course details with lessons
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $lessons = $course->lessons; // Assuming Course has a relationship with Lesson
        return view('admin.students.courseDetails', compact('course', 'lessons'));
    }

    // Show individual lesson content
    public function showLesson($id)
    {
        // Find the selected lesson
        $lesson = Lesson::findOrFail($id);

        // Retrieve all lessons for the course the lesson belongs to
        $lessons = $lesson->course->lessons; // Assuming Lesson belongs to a Course

        return view('admin.students.lessonDetails', compact('lesson', 'lessons'));
    }

    public function open($id)
    {
        $course = Course::findOrFail($id);
        $lessons = $course->lessons;
        return view('admin.students.courseDetails', compact('course', 'lessons'));
    }
}
