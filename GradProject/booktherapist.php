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
                        <input type="date" id="date" name="appointment_date" required>
                    </div>

                    <div class="form-group">
                        <label for="appointment_time">Choose session time:</label>
                        <input type="time" id="timefrom" name="appointment_time" required>
                    </div>
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


    if (isset($_GET['booktherapist'])) {
        $id = $_GET['booktherapist'];

        if(isset($_POST['reserve'])) {

        $date = $_POST['date'];
        $time_from = $_POST['timefrom'];
        // add 1 hour to the stored time and format the new time as h:mm AM/PM
        $time_to = date('g:i A', strtotime($time_from . ' +1 hour'));

        $sql = "SELECT * FROM schedule WHERE Therapist_Id = '$id'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $exsit_date = $row["Date"];
                $exist_time_from = $row["Time_From"];
                $exist_time_to = $row["Time_To"];

                // convert the existing time value to 12-hour format
    $exist_time_from12 = date('h:i A', strtotime($exist_time_from));
    $exist_time_to12 = date('h:i A', strtotime($exist_time_to));

                if ($date == $exsit_date && $time_from == $exist_time_from12 && $time_to == $exist_time_to12) {
                    echo '<script>alert("This session is already booked")</script>';
                } else {
                    $sql1 = "INSERT INTO schedule (Therapist_Id , Date , Time_From, Time_To) 
                    VALUES ('$id','$date','$time_from', '$time_to')";
                    $result1 = mysqli_query($con, $sql1);
                    if ($result1) {
                        $q = "SELECT Hour_Rate FROM therapists WHERE Therapist_ID ='$id'";
                        $r = mysqli_query($con, $q);
                        if (mysqli_num_rows($r) > 0) {
                            while ($row = mysqli_fetch_assoc($r)) {
                                $hour_rate = $row["Hour_Rate"];
                                $q1 = "SELECT P_ID FROM patients WHERE Email = '$e'";
                                $r1 = mysqli_query($con, $q1);
                                if (mysqli_num_rows($r1) > 0) {
                                    while ($row = mysqli_fetch_assoc($r1)) {
                                        $p_id = $row["P_ID"];
                                        $sql2 = "INSERT INTO request (Therapist_ID, P_ID, Status, Date,	TimeFrom, TimeTo, Request_Value) 
                                 VALUES ('$id', '$p_id', '$date','$time_from', '$time_to', '$hour_rate')";
                                        $result2 = mysqli_query($con, $sql2);

                                        if ($result2) {
                                            header('location:payment.php');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

    ?>
</body>

</html>