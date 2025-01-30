<?php

include('connection.php');
include('logform.php');

// Retrieve patient data from the database
$e = $_SESSION['name'];

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
  exit();
}

   //get sub plan id of logged in patient
   $query = "SELECT Sub_ID FROM patients WHERE Email = '$e' ";
   $r = mysqli_query($con, $query);
   if (mysqli_num_rows($r) > 0) {
       // Fetch the row as an associative array
       $row = mysqli_fetch_assoc($r);
       // Get the ID from the row and store it in a variable
       $subid = $row["Sub_ID"];
    } else {
        echo "<script>alert('Please Subscribe First')</script>";
    }
    
    // Use the variable globally
    function myFunction() {
        global $subid;
    }
$qq = "SELECT * FROM sub_plan WHERE Sub_ID = '$subid'";
$rr=mysqli_query($con,$qq);
while($row1=mysqli_fetch_array($rr)){
    $eid = $row1['Event_ID'];
    $bid = $row1['Book_ID'];
    $gid = $row1['Group_ID'];

    include('connection.php');

//enable user to join event
if (isset($_GET['eventid'])) {
    $eventid = $_GET['eventid'];

        $sql = "SELECT Event_ID FROM sub_plan
        WHERE Sub_ID =$subid AND Event_ID IS NOT NULL";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // User has already booked an event
            echo "<script>alert('You have already booked an event')</script>";
        } else {

            $sql = "UPDATE sub_plan SET Event_ID ='$eventid' WHERE Sub_ID = '$subid'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                // User has booked an event
                echo "<script>alert('You have booked an event')</script>";
                // header('location:subplan.php');
            }
        }
    }
// }
include('connection.php');

//enable user to join book
if (isset($_GET['bookid'])) {
    $bookid = $_GET['bookid'];

        $sql = "SELECT Book_ID FROM sub_plan WHERE Book_ID IS NOT NULL AND Sub_ID =$subid ";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // User has already booked a book discussion
            echo  "<script>alert('You have already booked a book discussion ')</script>";
        } else {

            $sql = "UPDATE sub_plan SET Book_ID = '$bookid' WHERE Sub_ID = '$subid'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                // User has booked a book discussion
                echo  "<script>alert('You have booked a book discussion ')</script>";
                // header('location:subplan.php');

            }
        }
    }
// }
include('connection.php');

//enable user to join group therapy
if (isset($_GET['groupid'])) {
    $groupid = $_GET['groupid'];

        $sql = "SELECT Group_ID FROM sub_plan
            WHERE Group_ID IS NOT NULL AND Sub_ID =$subid ";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // User has already booked a group therapy
            echo  "<script>alert('You have already booked a group therapy')</script>";
        } else {

            $sql = "UPDATE sub_plan SET Group_ID = '$groupid' WHERE Sub_ID = '$subid'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                // User has booked a group therapy
                echo  "<script>alert('You have booked a group therapy')</script>";
                // header('location:subplan.php');

            }
        }
    }
}
?>

