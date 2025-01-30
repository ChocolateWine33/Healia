<?php 
include ('connection.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapists</title>
    <link rel="stylesheet" type="text/css" href="therapists.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
</head>

<body>
<?php include ('header.php')?>

    <?php
    $sql = "SELECT * FROM therapists WHERE Is_Accepted = 'Accepted' ";
    $result = $con->query($sql);
    
    echo '<div class="doctor-info">';

    while ($row = mysqli_fetch_assoc($result)) {

        echo '<div class="doctor-box">';
        echo '<img width="150" height="150" src="therapists/' . $row['Therapist_Image'] . '">';
        echo '<h2>' . $row['Therapist_Name'] . '</h2>';
        echo '<p><b>Qualification:</b> ' . $row['qualification'] . '</p>';
        echo '<p><b>Specialization:</b> ' . $row['specialization'] . '</p>';
        echo '<p><b>Experience Years:</b> ' . $row['experience'] . '</p>';
        echo '<p><b>Hour_Rate:</b> ' . $row['Hour_Rate'] . '</p>';
        echo '<a style="text-decoration:none;" href="booktherapist-new.php?therapistid='.$row["Therapist_ID"].'" class="text-light"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#">
               Book </button> </a> ';
        echo '</div>';
    }
    echo '</div>';  
      ?>


<?php

include('connection.php');

if (isset($_POST['book'])) {

//   $id = mysqli_real_escape_string($con, $_POST['id']);
  $date = mysqli_real_escape_string($con, $_POST['Date']);
  $time_from = mysqli_real_escape_string($con, $_POST['TimeFrom']);
  $time_to = mysqli_real_escape_string($con, $_POST['TimeTo']);

   // Check the schedule table for conflicts
   $sql = "SELECT * FROM schedule WHERE Date='$appointment_date' AND Time_From ='$appointment_time'";
   $result = mysqli_query($con, $sql);


//   $q="SELECT * FROM schedule 
//   LEFT JOIN therapists
//   ON schedule.Therapist_Id = therapists.Therapist_ID
//   WHERE Date=$date AND Time_From =$time_from AND Time_To = $time_to ";

//  $r = mysqli_query($con, $q);

//  if (mysqli_num_rows($r) > 0) {

//       // If there is a conflicting appointment, output an error message
//       echo  '<script> alert ("The selected time is not available");</script>';
//   } else {

//   // Insert the event data into the database
//   $sql = "INSERT INTO request (Date, TimeFrom ,TimeTo)
//    VALUES ( '$date' ,'$time_from','$time_to')";

//   if (mysqli_query($con, $sql)) {
//     echo '<script> alert ("Request Sent successfully!");</script>';
//   } else {
//     echo "Error sending request: " . mysqli_error($con);
//   }
// }
// $query= "INSERT INTO schedule (Date, TimeFrom ,TimeTo)
// VALUES ( '$date' ,'$time_from','$time_to')";

// if (mysqli_query($con, $query)) {
//   echo '<script> alert ("Request Sent successfully!");</script>';
// } else {
//   echo "Error sending request: " . mysqli_error($con);
// }
}
?>


<?php include ('./Header-Footer/footer.php')?>
</body>

</html>