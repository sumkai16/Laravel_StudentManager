<h2>Edit Subject</h2>
<form method="POST" action="{{ route('subjects.update', $subject->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="subject_code" value="{{ $subject->subject_code }}" required>
    <input type="text" name="subject_name" value="{{ $subject->subject_name }}" required>
    <input type="text" name="description" value="{{ $subject->description }}" required>
    <input type="text" name="year_level" value="{{ $subject->year_level }}" required>

    <button type="submit">Update</button>
</form>
<a href="{{ route('subjects.index') }}">Back to List</a>