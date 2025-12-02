<nav>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('students.index') }}">Students</a>
    <a href="{{ route('subjects.index') }}">Subjects</a>
</nav>

<h2>Subject Details</h2>

<table border="1">
    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>
    <tr>
        <td><strong>ID</strong></td>
        <td>{{ $subject->id }}</td>
    </tr>
    <tr>
        <td><strong>Subject Code</strong></td>
        <td>{{ $subject->subject_code }}</td>
    </tr>
    <tr>
        <td><strong>Subject Name</strong></td>
        <td>{{ $subject->subject_name }}</td>
    </tr>
    <tr>
        <td><strong>Description</strong></td>
        <td>{{ $subject->description }}</td>
    </tr>
    <tr>
        <td><strong>Year Level</strong></td>
        <td>{{ $subject->year_level }}</td>
    </tr>
    <tr>
        <td><strong>Created At</strong></td>
        <td>{{ $subject->created_at->format('M d, Y h:i A') }}</td>
    </tr>
    <tr>
        <td><strong>Updated At</strong></td>
        <td>{{ $subject->updated_at->format('M d, Y h:i A') }}</td>
    </tr>
</table>

<br>

<a href="{{ route('subjects.index') }}">← Back to List</a>
<a href="{{ route('subjects.edit', $subject->id) }}">Edit</a>

<form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
</form>