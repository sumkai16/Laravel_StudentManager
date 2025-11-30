<nav>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route(('students.index')) }}">Students</a>
    <a href="{{ route('subjects.index') }}">Subjects</a>
</nav>
<h2>Students</h2>

<a href="{{ route('students.create') }}">Add Student</a>

<table border="1">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Course</th>
        <th>Year</th>
        <th>Actions</th>
    </tr>

    @foreach($students as $student)
    <tr>
        <td>{{ $student->firstname }}</td>
        <td>{{ $student->lastname }}</td>
        <td>{{ $student->course }}</td>
        <td>{{ $student->year_level }}</td>
        <td>
            <a href="{{ route('students.edit', $student->id) }}">Edit</a>

            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
