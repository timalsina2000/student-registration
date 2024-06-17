<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Styles -->
        <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css" rel="stylesheet" type="text/css"/>



        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            /* Style for form container */
form-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

/* Style for form groups */
form-group {
    margin-bottom: 20px;
}

/* Style for form labels */
form-group label {
    font-weight: bold;
}

/* Style for form inputs */
form-control {
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


<!-- <script>
        function convertToNepaliDate() {
            var gregorianDate = document.getElementById('calendar').value;
            var nepaliDate = NepaliFunctions.AD2BS(gregorianDate);
            document.getElementById('nepaliDate').value = nepaliDate;
        }
        $('#nepaliDatePicker').nepaliDatePicker();
    </script> -->
    </head>
<body class="antialiased">

<div class="container">
    <h2>Student Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/students" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>


        <div class="form-group">
        <input type="text" id="nepali-datepicker" placeholder="Select Nepali Date"/>
        </div>
        <!-- <div class="form-group">
            <label for="calendar">English Date:</label>
            <input type="date" class="form-control" id="calendar" name="calendar">
        </div> -->

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            window.onload = function() {
                var mainInput = document.getElementById("nepali-datepicker");
                mainInput.nepaliDatePicker();
            };
        </script>

</body>
</html>
