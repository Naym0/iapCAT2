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

        <center><h1>Register a new student</h1>
        <form action="/insert" method="post">
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
        </form></center><br><hr><br>

        <center><button><a href='/onestudent'>Search one students fees</a></button></center>
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
