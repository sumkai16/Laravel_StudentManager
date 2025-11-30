<h2>Add Student</h2>

<form method="POST" action="{{ route('students.store') }}">
    @csrf
    <input type="text" name="firstname" placeholder="First Name" required>
    <input type="text" name="lastname" placeholder="Last Name" required>
    <input type="text" name="course" placeholder="Course" required>
    <input type="text" name="year_level" placeholder="Year Level" required>
    <button type="submit">Save</button>
</form>

<a href="{{ route('students.index') }}">Back to List</a>