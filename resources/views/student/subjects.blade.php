@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">My Subjects</h1>

    @if($subjects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($subjects as $subject)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $subject->name }}</h2>
                    <p class="text-gray-600">{{ $subject->description }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">You are not enrolled in any subjects yet.</p>
    @endif
</div>
@endsection
