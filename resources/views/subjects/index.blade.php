<nav>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route(('students.index')) }}">Students</a>
    <a href="{{ route('subjects.index') }}">Subjects</a>
</nav>
<h2>Subjects</h2>
<a href="{{ route('subjects.create') }}">Add Subject</a>

<table border="1">
    <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Description</th>
        <th>Year Level</th>
    </tr>
    @foreach ($subjects as $subject)
    <tr>
        <td>{{ $subject->subject_code }}</td>
        <td>{{ $subject->subject_name }}</td>
        <td>{{ $subject->description }}</td>
        <td>{{ $subject->year_level }}</td>
        <td>
            <a href="{{ route('subjects.edit', $subject->id) }}">Edit</a>

            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>