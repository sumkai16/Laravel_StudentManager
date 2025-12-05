@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <a href="{{ route('students.index') }}" 
           class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold">Student Manager</h2>
            <p class="text-gray-600 mt-2 text-sm">Manage student records</p>
        </a>

        <a href="{{ route('subjects.index') }}"
           class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold">Subject Manager</h2>
            <p class="text-gray-600 mt-2 text-sm">Manage subjects</p>
        </a>

   

        <a href="{{ route('users.index') }}"
           class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold">User Management</h2>
            <p class="text-gray-600 mt-2 text-sm">Manage system users & roles</p>
        </a>

    </div>
</div>
@endsection
