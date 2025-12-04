<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $students = Student::all();
    $subjects = Subject::all();
    $enrollments = DB::table('student_subject')->get();
    return view('dashboard', compact('students', 'subjects', 'enrollments'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes available to all authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // admin-only management
    Route::resource('students', StudentController::class);
    Route::resource('subjects', SubjectController::class);
    Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');

    // enroll/unenroll routes
    Route::post('/students/{student}/enroll', [EnrollmentController::class, 'store'])
         ->name('students.enroll');
    Route::delete('/students/{student}/unenroll/{subject}', [EnrollmentController::class, 'destroy'])
         ->name('students.unenroll');
    Route::get('/students/{student}/edit-enrollment',[EnrollmentController::class, 'edit'])
         ->name('students.enrollment.edit');
    Route::put('/students/{student}/edit-enrollment',[EnrollmentController::class, 'update'])
         ->name('students.enrollment.update');

     Route::get('/subjects/{id}/manage-enrollment',[EnrollmentController::class, 'manage'])
         ->name('enrollment.manage');
     Route::delete('/subjects/{sid}/remove/{studid}', [EnrollmentController::class, 'remove'])
     ->name('enrollment.remove');
});

// Student-only routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

    // Student can only view their own data
    Route::get('/my-subjects', [StudentController::class, 'subjects'])->name('student.subjects');
});

require __DIR__.'/auth.php';
