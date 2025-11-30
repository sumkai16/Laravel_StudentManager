<h2>Add Subject</h2>

<form method="POST" action="{{ route('subjects.store') }}">
    @csrf
    <input type="text" name="subject_code" placeholder="Subject Code" required>
    <input type="text" name="subject_name" placeholder="Subject Name" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="text" name="year_level" placeholder="Year Level" required>
    <button type="submit">Save</button>
</form>

<a href="{{ route('subjects.index') }}">Back to List</a>