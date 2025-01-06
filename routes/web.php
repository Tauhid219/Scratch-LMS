<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Routes
// Route::group(['middleware' => 'auth'], function () {
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mydashboard', [DashboardController::class, 'index'])->name('mydashboard');

    Route::resource('/permission', PermissionController::class)->names('pr');
    Route::resource('/role', RoleController::class)->names('rl');
    Route::get('/role/{id}/add-permissions', [RoleController::class, 'addPermissionToRole'])->name('addPermissionToRole');
    Route::put('/role/{id}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('givePermissionToRole');
    Route::resource('/user', UserController::class)->names('user');
    Route::resource('/product', ProductController::class)->names('prd');
    Route::get('rolepermission-page', function () {
        return view('admin.role-permission.rolepermission-page');
    })->name('rolepermission-page')->middleware('role:super-admin');

    Route::resource('/courses', CourseController::class)->names('courses')->middleware('role:super-admin');
    Route::resource('/lessons', LessonController::class)->names('lessons')->middleware('role:super-admin');
    Route::resource('/category', CategoryController::class)->names('category')->middleware('role:super-admin');
    Route::resource('/languages', LanguageController::class)->names('languages')->middleware('role:super-admin');

    Route::get('/student-courses', [StudentController::class, 'index'])->name('stdc.index');
    Route::post('/student-courses/{course}/enroll', [StudentController::class, 'enroll'])->name('stdc.enroll');
    Route::get('/student-courses/{id}', [StudentController::class, 'show'])->name('stdc.show');
    Route::get('/student-lessons/{id}', [StudentController::class, 'showLesson'])->name('stdc.showLesson');
    Route::get('/open-course/{id}', [StudentController::class, 'open'])->name('stdc.open')->middleware('role:student');
});

// Frontend Routes
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/olympiad', 'olympiad')->name('olympiad');
});
