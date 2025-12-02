<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // enroll a student in a subject
    public function store(Request $request, Student $student)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $subjectId = $request->input('subject_id');

        // attach only if not already attached
        if (!$student->subjects()->where('subject_id', $subjectId)->exists()) {
            $student->subjects()->attach($subjectId);
            return redirect()->route('students.show', $student)
                             ->with('success', 'Student enrolled successfully.');
        }

        return redirect()->route('students.show', $student)
                         ->with('info', 'Student is already enrolled in that subject.');
    }

    // unenroll (detach)
    public function destroy(Student $student, Subject $subject)
    {
        $student->subjects()->detach($subject->id);

        return redirect()->route('students.show', $student)
                         ->with('success', 'Subject removed from student.');
    }
}
