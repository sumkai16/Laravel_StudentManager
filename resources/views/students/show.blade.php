<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Student Information</h3>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">ID:</dt>
                                    <dd class="text-sm text-gray-900">{{ $student->id }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">First Name:</dt>
                                    <dd class="text-sm text-gray-900">{{ $student->firstname }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Last Name:</dt>
                                    <dd class="text-sm text-gray-900">{{ $student->lastname }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Course:</dt>
                                    <dd class="text-sm text-gray-900">{{ $student->course }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Year Level:</dt>
                                    <dd class="text-sm text-gray-900">{{ $student->year_level }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Timestamps</h3>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Created At:</dt>
                                    <dd class="text-sm text-gray-900">{{ $student->created_at->format('M d, Y h:i A') }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Updated At:</dt>
                                    <dd class="text-sm text-gray-900">{{ $student->updated_at->format('M d, Y h:i A') }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="flex space-x-4 mb-6">
                        <a href="{{ route('students.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            ← Back to List
                        </a>
                        <a href="{{ route('students.edit', $student->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Edit
                        </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Delete
                            </button>
                        </form>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Enrolled Subjects</h3>
                        <p>
                            <a href="{{ route('students.enrollment.edit', $student) }} " class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-md padding-2 transition duration-150 ease-in-out margin-bottom-4">
                                Edit Enrollment
                            </a>
                        </p>

                        @if(session('success'))
                          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                          </div>
                        @endif
                        @if(session('info'))
                          <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                            {{ session('info') }}
                          </div>
                        @endif

                        @if($student->subjects->isEmpty())
                          <p class="text-gray-500">No subjects enrolled yet.</p>
                        @else
                          <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Units</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enrolled At</th>
                                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($student->subjects as $subject)
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $subject->subject_code ?? '-' }}</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $subject->subject_name }}</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $subject->units }}</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $subject->pivot->created_at ? $subject->pivot->created_at->format('Y-m-d H:i') : '-' }}</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{ route('students.unenroll', [$student, $subject]) }}" method="POST" class="inline">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" onclick="return confirm('Unenroll subject?')" class="text-red-600 hover:text-red-900">Unenroll</button>
                                    </form>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        @endif
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Enroll in a Subject</h3>
                        <form action="{{ route('students.enroll', $student) }}" method="POST" class="space-y-4">
                          @csrf
                          <div>
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Select subject:</label>
                            <select name="subject_id" id="subject_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option value="">-- choose --</option>
                              @foreach(App\Models\Subject::all() as $subjectOption)
                                {{-- skip already enrolled subjects --}}
                                @if(!$student->subjects->contains($subjectOption->id))
                                  <option value="{{ $subjectOption->id }}">
                                    {{ $subjectOption->subject_code ?? '' }} - {{ $subjectOption->subject_name }} ({{ $subjectOption->units }}u)
                                  </option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                          <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Enroll
                          </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
