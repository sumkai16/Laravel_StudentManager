<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// ----------------------------------------------
// PUBLIC
// ----------------------------------------------
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', App\Http\Controllers\UserController::class);
});

// ----------------------------------------------
// SHARED DASHBOARD (redirect based on role)
// ----------------------------------------------
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('student.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ----------------------------------------------
// PROFILE (all authenticated users)
// ----------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------------------------------------
// ADMIN ONLY
// ----------------------------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Admin Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
         ->name('admin.dashboard');

    // CRUD
    Route::resource('students', StudentController::class);
    Route::resource('subjects', SubjectController::class);

    // Enrollment management
    Route::get('enrollments', [EnrollmentController::class, 'index'])
         ->name('enrollments.index');

    Route::post('/students/{student}/enroll', [EnrollmentController::class, 'store'])
         ->name('students.enroll');

    Route::delete('/students/{student}/unenroll/{subject}', [EnrollmentController::class, 'destroy'])
         ->name('students.unenroll');

    Route::get('/students/{student}/edit-enrollment', [EnrollmentController::class, 'edit'])
         ->name('students.enrollment.edit');

    Route::put('/students/{student}/edit-enrollment', [EnrollmentController::class, 'update'])
         ->name('students.enrollment.update');

    Route::get('/subjects/{id}/manage-enrollment', [EnrollmentController::class, 'manage'])
         ->name('enrollment.manage');

    Route::delete('/subjects/{sid}/remove/{studid}', [EnrollmentController::class, 'remove'])
         ->name('enrollment.remove');
});

// ----------------------------------------------
// STUDENT ONLY
// ----------------------------------------------
Route::middleware(['auth', 'role:student'])->group(function () {

    // Student Dashboard
    Route::get('/student/dashboard', [DashboardController::class, 'student'])
         ->name('student.dashboard');

    // Student's own subjects
    Route::get('/my-subjects', [StudentController::class, 'subjects'])
         ->name('student.subjects');
     Route::get('/enroll', [EnrollmentController::class, 'create'])
         ->name('enrollments.create');
     Route::post('/enroll', [EnrollmentController::class, 'store'])
         ->name('enrollments.store');
});
Route::get('/redirect', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('student.dashboard');
});

// ----------------------------------------------
require __DIR__.'/auth.php';
