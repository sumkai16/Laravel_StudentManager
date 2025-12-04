<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $students = \App\Models\Student::all();
       return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \App\Models\Student::create($request->all());
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('subjects');
        $availableSubjects = \App\Models\Subject::whereNotIn(
            'id',
            $student->subjects->pluck('id')
        )->get();
        return view('students.show', compact('student', 'availableSubjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
      $validated = $request->validate([
          'firstname' => 'required|string|max:255',
          'lastname' => 'required|string|max:255',
          'course' => 'required|string|max:255',
          'year_level' => 'required|string|max:255',
      ]);
      $student->update($validated);
      return redirect() ->route('students.index')
                        ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $student)
    {
        if(Gate::denies('delete-student', $student)){
            abort(403, 'Unauthorized action.');
        }
        $student -> delete();
        return redirect()->route('students.index')
                            ->with('success', 'Student deleted successfully.');
    }

    /**
     * Display the student dashboard.
     */
    public function dashboard()
    {
        // Assuming the authenticated user is linked to a student record
        // You may need to adjust this based on your user-student relationship
        $user = auth()->user();
        // For now, return a simple view - you can customize this
        return view('student.dashboard');
    }

    /**
     * Display the student's enrolled subjects.
     */
    public function subjects()
    {
        // Assuming the authenticated user is linked to a student record
        // You may need to adjust this based on your user-student relationship
        $user = auth()->user();
        // For now, return a simple view - you can customize this
        return view('student.subjects');
    }
}
