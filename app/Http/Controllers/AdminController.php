<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $enrollments = DB::table('student_subject')->get();

        return view('admin.dashboard', compact('students', 'subjects', 'enrollments'));
    }
}
