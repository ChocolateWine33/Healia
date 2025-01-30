<?php

include('connection.php');

if(isset($_GET['requestid'])){
    $rid = $_GET['requestid'];

    $sql = "UPDATE request SET Status = 'Cancelled' WHERE Request_Id = '$rid'";
    $result = mysqli_query($con,$sql);
    if($result){
        $sql2 = "DELETE FROM payment WHERE Request_Id = '$rid'";
        $result2 = mysqli_query($con, $sql2);
        if($result2){
            $sql3 = "SELECT Therapist_ID FROM request WHERE Request_Id = '$rid'";
            $result3 = mysqli_query($con,$sql3);
            if (mysqli_num_rows($result3) > 0) {
                $row = mysqli_fetch_assoc($result3);
                $therapist_id = $row["Therapist_ID"];
$sql4= "DELETE FROM schedule WHERE Therapist_ID = '$therapist_id'";
$result4 = mysqli_query($con, $sql4);
if($result4){
    header('location:profile.php');
}
        }
    }
}
}
