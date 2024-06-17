<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
</head>
<body>

    <h1>Students List</h1>
    @if($students->isEmpty())
        <p>No students found.</p>
    @else
        <ul>
            @foreach($students as $student)
                <li>
                    Name: {{ $student->name }}<br>
                    Address: {{ $student->address }}<br>
                    Class: {{ $student->class }}<br>
                    Nepali Date: {{ $student->nepaliDate }}<br>
                    Calendar: {{ $student->calendar }}<br>
                    @if($student->image)
                        Image: <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image"><br>
                    @else
                        Image: No image available<br>
                    @endif

                    <a href="{{ route('edit.student', ['id' => $student->id]) }}">Edit</a>


                    <form action="{{ route('delete.student', ['id' => $student->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>



