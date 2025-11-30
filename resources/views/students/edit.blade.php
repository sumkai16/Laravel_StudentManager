<h2>Edit Student</h2>

<form method="POST" action="{{ route('students.update', $student->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="firstname" value="{{ $student->firstname }}">
    <input type="text" name="lastname" value="{{ $student->lastname }}">
    <input type="text" name="course" value="{{ $student->course }}">
    <input type="text" name="year_level" value="{{ $student->year_level }}">

    <button type="submit">Update</button>
</form>
