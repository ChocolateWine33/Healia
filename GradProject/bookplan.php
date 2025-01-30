<?php

include('connection.php');
include('logform.php');
include('payment.php');


// Retrieve patient data from the database
$e = $_SESSION['name'];

if (!isset($_SESSION['name'])) {
    
    header('Location: login.php');
    exit();
}

$query = "SELECT Sub_ID  FROM patients WHERE Email = $e";
$result = mysqli_query($con, $query); 
$row = mysqli_fetch_assoc($result);
$subid = $row['Sub_ID'];

// The user is logged in, allow them to book the event
if(isset($_GET['eventid'])){
    $eventid = $_GET['eventid'];

    // $sql = "SELECT subscription_plan.* , patients.*
    // FROM subscription_plan 
    // FULL JOIN patients
    // ON subscription_plan.Sub_ID = patients.Sub_ID
    // WHERE patients.Email = '$e' AND subscription_plan.Event_ID NOT NULL ";
    $sql="SELECT Event_ID FROM subscription_plan
    WHERE Event_ID NOT NULL AND Sub_ID =$subid ";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // User has already booked an event
    echo 'You have already booked an event.';
} else {
   

    $sql="INSERT INTO subscription_plan (Event_ID) VALUES ('$eventid')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // User has booked an event
        echo 'You have booked an event.';
    }
}
}

if(isset($_GET['bookid'])){
    $eventid = $_GET['bookid'];

    $sql = "SELECT subscription_plan.* , patients.*
    FROM subscription_plan 
    FULL JOIN patients
    ON subscription_plan.Sub_ID = patients.Sub_ID
    WHERE Event_ID NOT NULL";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // User has already booked an event
    echo 'You have already booked an event.';
} else {

    $sql="INSERT INTO subscription_plan (Book_ID) VALUES ('$eventid')";
}
}

if(isset($_GET['groupid'])){
    $eventid = $_GET['groupid'];

    $sql = "SELECT event_id FROM bookings WHERE user_id = $user_id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // User has already booked an event
    echo 'You have already booked an event.';
} else {

    $sql="INSERT INTO subscription_plan (Group_ID) VALUES ('$eventid')";
}
}
?>