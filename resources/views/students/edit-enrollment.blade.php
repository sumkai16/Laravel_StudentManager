@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Enrollment for {{ $student->firstname }} {{ $student->lastname }}</h2>

                <form action="{{ route('students.enrollment.update', $student) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        @foreach($subjects as $subject)
                        <div class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <input
                                type="checkbox"
                                name="subjects[]"
                                value="{{ $subject->id }}"
                                {{ $student->subjects->contains($subject->id) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            >
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">{{ $subject->subject_name }}</h3>
                                        <p class="text-sm text-gray-500">Code: {{ $subject->subject_code }}</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $subject->units }} Units
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <a href="{{ route('students.show', $student) }}" class="text-gray-600 hover:text-gray-900">← Back to student</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
