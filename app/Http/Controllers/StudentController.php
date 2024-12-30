<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch courses from the database
        $courses = Course::all(); // Adjust query as needed (e.g., pagination or filters)

        // Pass courses to the view
        return view('admin.students.courseList', compact('courses'));
    }
}
