<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('students', \App\Http\Controllers\StudentController::class);
    Route::resource('subjects', \App\Http\Controllers\SubjectController::class);
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    // enroll/unenroll routes
    Route::post('/students/{student}/enroll', [\App\Http\Controllers\EnrollmentController::class, 'store'])
         ->name('students.enroll');
    Route::delete('/students/{student}/unenroll/{subject}', [\App\Http\Controllers\EnrollmentController::class, 'destroy'])
         ->name('students.unenroll');
    Route::get('/students/{student}/edit-enrollment',[\App\Http\Controllers\EnrollmentController::class, 'edit'])
         ->name('students.enrollment.edit');
    Route::put('/students/{student}/edit-enrollment',[\App\Http\Controllers\EnrollmentController::class, 'update'])
         ->name('students.enrollment.update');
        
});

require __DIR__.'/auth.php';
