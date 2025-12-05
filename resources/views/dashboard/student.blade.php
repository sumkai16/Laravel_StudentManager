@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Student Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <a href="{{ route('student.subjects') }}"
           class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold">My Subjects</h2>
            <p class="text-gray-600 mt-2">View enrolled subjects</p>
        </a>
        <a href="{{ route('enrollments.create') }}"
           class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold">Enroll in Subjects</h2>
            <p class="text-gray-600 mt-2">Request enrollment in new subjects</p>
      

    </div>
</div>
@endsection
