@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                
                {{-- Display Validation Errors --}}
                @if ($errors->any())
                    <div class="bg-red-100
                            border border-red-400 
                            text-red-700 
                            px-4 py-3 
                            rounded mb-4">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                    </div>
                @endif

                {{-- Create Enrollment Form --}}
                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf

                    {{-- Subject Selection --}}
                    <div class="mb-4">
                        <label for="subject_id" class="block text
                            -gray-700 text-sm font-bold mb-2">
                            Select Subject <span class="text-red-500">*</span>
                        </label>
                        <select name="subject_id"
                                id="subject_id"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('subject_id') border-red-500 @enderror">
                            <option value="">-- Choose a Subject --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" 
                                    {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->subject_code }} - {{ $subject->subject_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Submit Button --}}
                    <div class="flex items
                        -center justify-end mt-4">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit Enrollment Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection