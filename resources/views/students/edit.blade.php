<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Display Validation Errors --}}
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Create Student Form --}}
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- First Name --}}
                        <div class="mb-4">
                            <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2">
                                First Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="firstname" 
                                   id="firstname"
                                   value="{{ old('firstname', $student->firstname) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('firstname') border-red-500 @enderror"
                                   placeholder="Enter first name">
                            @error('firstname')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Last Name --}}
                        <div class="mb-4">
                            <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">
                                Last Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="lastname" 
                                   id="lastname"
                                   value="{{ old('lastname', $student->lastname) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('lastname') border-red-500 @enderror"
                                   placeholder="Enter last name">
                            @error('lastname')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Course --}}
                        <div class="mb-4">
                            <label for="course" class="block text-gray-700 text-sm font-bold mb-2">
                                Course <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="course" 
                                   id="course"
                                   value="{{ old('course', $student->course) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('course') border-red-500 @enderror"
                                   placeholder="e.g., Computer Science, Engineering">
                            @error('course')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Year Level --}}
                        <div class="mb-6">
                            <label for="year_level" class="block text-gray-700 text-sm font-bold mb-2">
                                Year Level <span class="text-red-500">*</span>
                            </label>
                            <select name="year_level" 
                                    id="year_level"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('year_level') border-red-500 @enderror">
                                <option value="">Select Year Level</option>
                                <option value="1st Year" {{ old('year_level', $student->year_level) == '1st Year' ? 'selected' : '' }}>1st Year</option>
                                <option value="2nd Year" {{ old('year_level', $student->year_level) == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                <option value="3rd Year" {{ old('year_level', $student->year_level) == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                <option value="4th Year" {{ old('year_level', $student->year_level) == '4th Year' ? 'selected' : '' }}>4th Year</option>
                            </select>
                            @error('year_level')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="flex items-center justify-between">
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Student
                            </button>
                            <a href="{{ route('students.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Cancel
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>