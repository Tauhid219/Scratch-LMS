<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

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
    public function enroll(Request $request, Course $course)
    {
        $user = Auth::user();

        // Check if the student is already enrolled
        if (Enrollment::where('student_id', $user->id)->where('course_id', $course->id)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        // Create the enrollment record
        Enrollment::create([
            'student_id' => $user->id,
            'course_id' => $course->id,
            'enrollment_date' => Carbon::now(),
            'status' => 'Active',
        ]);

        // Check and assign 'student' role if not already assigned
        if (!$user->hasRole('student')) {
            $user->syncRoles(['student']);
        }

        return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
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
