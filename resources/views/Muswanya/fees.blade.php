<!DOCTYPE html>
<html>
    <head>
        <title>101112</title>
    </head>

    <?php
        $data = DB::table("fees")->sum('amount');
    ?>

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

        <center><h1>Input new fees data for a Student</h1>
            <form action="/store" method='post'>
                @csrf
                Student ID:
                <input type="text" name="id"><br><br>
                Amount Paid:
                <input type="text" name="amount"><br><br>
                <button type="submit" name="submit">Submit</button>
            </form><br><hr><br>

            <h3>Total amount paid by all students:</h3>  <h2><?php echo $data?> </h2><br>

            <table border="1px" width="50%" align="center">
                <tr>
                    <td>STUDENT ID</td>
                    <td>AMOUNT</td>
                </tr>
            @foreach($fees as $fee)
                <tr>
                    <td>{{$fee->student_id}}</td>
                    <td>{{$fee->amount}}</td>
                </tr>
            @endforeach
            </table></center>
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