<nav>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('students.index') }}">Students</a>
    <a href="{{ route('subjects.index') }}">Subjects</a>
</nav>

<h2>Student Details</h2>

<table border="1">
    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>
    <tr>
        <td><strong>ID</strong></td>
        <td>{{ $student->id }}</td>
    </tr>
    <tr>
        <td><strong>First Name</strong></td>
        <td>{{ $student->firstname }}</td>
    </tr>
    <tr>
        <td><strong>Last Name</strong></td>
        <td>{{ $student->lastname }}</td>
    </tr>
    <tr>
        <td><strong>Course</strong></td>
        <td>{{ $student->course }}</td>
    </tr>
    <tr>
        <td><strong>Year Level</strong></td>
        <td>{{ $student->year_level }}</td>
    </tr>
    <tr>
        <td><strong>Created At</strong></td>
        <td>{{ $student->created_at->format('M d, Y h:i A') }}</td>
    </tr>
    <tr>
        <td><strong>Updated At</strong></td>
        <td>{{ $student->updated_at->format('M d, Y h:i A') }}</td>
    </tr>
</table>

<br>

<a href="{{ route('students.index') }}">← Back to List</a>
<a href="{{ route('students.edit', $student->id) }}">Edit</a>

<form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
</form>