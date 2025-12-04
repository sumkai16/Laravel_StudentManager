@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <h1 class="page-title">Manage Enrollment</h1>

    <div class="subject-box">
        <h2>{{ $subject->subject_name }} ({{ $subject->subject_code }})</h2>
        <p>{{ $subject->description }}</p>
        <p><strong>Year Level:</strong> {{ $subject->year_level }}</p>
        <p><strong>Units:</strong> {{ $subject->units }}</p>
    </div>

    <h3 class="sub-title">Enrolled Students</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Year</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @forelse ($enrolled as $student)
                <tr>
                    <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->year_level }}</td>
                    <td>
                        <form action="{{ route('enrollment.remove', [$subject->id, $student->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align:center;">No students enrolled.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
