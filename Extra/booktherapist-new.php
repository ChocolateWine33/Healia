<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reserve Session</title>
    <link rel="stylesheet" type="text/css" href="booking.css">
</head>

<body>

    <form method="post">
        <div class="container">
            <div class="card">
                <img src="images/clock.png" class="card-img-top" alt="clock image">
                <div class="card-body">
                    <div class="form-group">
                        <label for="appointment_date">Choose session date:</label>
                        <input type="date" id="date" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="appointment_time">Choose session time:</label>
                        <input type="time" id="timefrom" name="timefrom" required>
                    </div>
                    <!-- <?php

                            echo '<button type="button" name="reserve">
                      <a style="text-decoration:none;" href="payment.php?therapistid=' . $row["Therapist_ID"] . '" class="text-light">
                             Book </a> </button>';
                            ?> -->
                    <button type="submit" name="reserve">Reserve Session</button>
                    </button>
                </div>
            </div>
    </form>

    <?php

    // Database connection 
    include('connection.php');
    include('logform.php');

    // Retrieve patient data from the database
    $e = $_SESSION['name'];
    $pid = $_SESSION['pid'];

    if (!isset($_SESSION['name'])) {
        header("Location: login.php");
        exit();
    }


    if (isset($_GET['therapistid'])) {
        $tid = $_GET['therapistid'];


        //get hour rate of therapist
        $query = "SELECT Hour_Rate FROM therapists WHERE Therapist_ID = '$tid'";
        $r = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($r);
        $Hour_Rate = $row["Hour_Rate"];
    } else {
        echo "<script>alert('Please log in First')</script>";
    }



    //get id of logged in patient
    $query1 = "SELECT P_ID FROM patients WHERE Email = '$e'";
    $r1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($r1) > 0) {
        // Fetch the row as an associative array
        $row1 = mysqli_fetch_assoc($r1);
        // Get the ID from the row and store it in a variable
        $pid = $row1["P_ID"];
    } else {
        echo "<script>alert('Please log in First')</script>";
    }

    // Use the variable globally
    function myFunction()
    {
        global $pid;
    }

    if (isset($_POST['reserve'])) {
        $date = $_POST['date'];
        $time_from = $_POST['timefrom'];
        // add 1 hour to the stored time and format the new time as h:mm AM/PM
        $time_to = date('g:i A', strtotime($time_from . ' +1 hour'));

        $sql = "SELECT * FROM schedule WHERE Therapist_Id = '$tid' AND Date = '$date' AND '$time_from' BETWEEN Time_From AND Time_To ";
        //Time_From = '$time_from'
        $result = mysqli_query($con, $sql);
        // Check if the query returned a result
        if (mysqli_num_rows($result) > 0) {
            // The chosen date and time is already in the schedule table
            echo "<script>alert('This date and time is already booked')</script>";
        } else {
            // The chosen date and time is available
            $qq = "INSERT INTO schedule (Therapist_Id, Date, Time_From,Time_To)
    VALUES ('$tid', '$date', '$time_from', '$time_to')";
            if ($con->query($qq)) {
                //insert into request table
                $status = 'Reserved';
                $sql1 = "INSERT INTO request (Therapist_ID, P_ID, Status, Date, TimeFrom, TimeTo, Request_Value)
        VALUES ('$tid', '$pid', '$status', '$date', '$time_from', '$time_to', '$Hour_Rate')";
                if ($con->query($sql1)) {
                    header('location:sessionpay.php');
                }
            }
        }
    }



    ?>