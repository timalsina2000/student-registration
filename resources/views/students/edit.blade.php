<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Student</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        /* Style for form container */
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Style for form groups */
        .form-group {
            margin-bottom: 20px;
        }

        /* Style for form labels */
        .form-group label {
            font-weight: bold;
        }

        /* Style for form inputs */
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* To include padding and border in the element's total width and height */
        }

        /* Style for submit button */
        form {
            display: block;
            width: 70%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body class="antialiased">

<div class="container">
    <h2>Edit Student</h2>



    <form action="{{ route('update-student', $student->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $student->name }}">
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $student->address }}">
        <br>
        <label for="class">Class:</label>
        <input type="text" id="class" name="class" value="{{ $student->class }}">
        <br>
        <label for="nepaliDate">Nepali Date:</label>
        <input type="text" id="nepaliDate" name="nepaliDate" value="{{ $student->nepaliDate }}">
        <br>
        <label for="calendar">Calendar:</label>
        <input type="date" id="calendar" name="calendar" value="{{ $student->calendar }}">
        <br>
        <label for="image">Update Image:</label>
        <input type="file" id="image" name="image" value="{{ $student->image }}">
        <br>
        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>
