<!DOCTYPE html>
<html>
    <head>
        <title>101112</title>
    </head>

    <style>
        body{
            background-color: pink;
        }
        .alert {
        width:50%;
        background-color: green;
        color: white;
        margin-left: auto;
        margin-right: auto;
        }
        .closebtn {
        margin-right: 7px;
        margin-top: 4px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }
        button{
        border-radius: 2px;
        background-color: white;
        font-size: 18px;
        height:30px;
        }
        button:hover {
        background-color: #eaf2ff;
        }
        a{
        color: black;
        }
        a:visited, :active{
        text-decoration: none !important;
        }
    </style>

    <body>

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session()->has('notif'))
            <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <center><h2>{{session()->get('notif')}}</h2></center>
            </div>
        @endif

        <center><h1><u>Register a new student</u></h1>
        <form action="/insert" method="post" width='50%'>
            @csrf
            First Name:
            <input type="text" name="fname"><br><br>
            Last Name:
            <input type="text" name="lname"><br><br>
            Email:
            <input type="email" name="email"><br><br>
            Age:
            <input type="text" name="age"><br><br>
            Date of Birth:
            <input type="date" name="dob"><br><br>
            Course:
            <input type="text" name="course"><br><br>
            <button type="submit" name="submit">Submit</button>
        </form></center><br><hr>

        <center><h1><u>See all fee payments made by a specific student</u></h1>
            <form action="/onestudent" method="post">
                @csrf
                Student ID:
                <input type="text" name="id"><br><br>
                <button type="submit" name="retrieve">Retrieve</button>
            </form><br><hr><br>

        <center><button><a href='/'>Back</a></button></center>
    </body>

    <script>
        // Get all elements with class="closebtn"
        var close = document.getElementsByClassName("closebtn");
        var i;

        // Loop through all close buttons
        for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
            close[i].onclick = function()
            {
                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;

                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";

                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
</html>
