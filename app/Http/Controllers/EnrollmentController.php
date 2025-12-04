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
    //edit
    public function edit(Student $student)
    {
        $student->load('subjects');
        $subjects = Subject::all();
        return view('students.edit-enrollment', compact('student', 'subjects'));
    }
    //update
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'subjects' => 'array',
        ]);

        $student->subjects()->sync($request->subjects ?? []);

        return redirect()->route('students.show', $student)
                         ->with('success', 'Enrollment updated successfully.');
    }
    public function manage($subject_id){
        $subject = Subject::findOrFail($subject_id);
        $enrolled = $subject->students;
        return view('enrollments.manage', compact('subject', 'enrolled'));
    }

    public function remove($subject_id, $student_id){
        $subject = Subject::findOrFail($subject_id);
        $subject->students()->detach($student_id);
        return back()->with('success', 'Student removed from subject.');
    }
    public function index(){
        $students = Student::with('subjects')->get();
        return view('enrollments.index', compact('students'));
    }
}
