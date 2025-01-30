<?php
include('connection.php');
include('logform.php');


// Retrieve patient data from the database
$e = $_SESSION['name'];
// $pid = $_SESSION['pid'];

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
  exit();
}

  $sql = " SELECT * FROM patients WHERE Email  = '$e' ";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $firstname = $row['F_Name'];
  $lastname = $row['L_Name'];
  $g = $row['Gender'];
  $image = $row['image'];
  $bd = $row['Birthdate'];
  $pemail = $row['Email'];
  $sid = $row['Sub_ID']
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
  <link rel="stylesheet" href="profile.css">
</head>

<body>

<?php include ('header.php')?>

  
  <div class="profile-container" >
      <div class="image-container">
        <?php
	
        // Check if the image path is empty or null
        if (empty($image)) {
      
          echo '<img  class="profile-picture" src="images/blank.png" width="200" height="200" >';
        }else{
          echo ' <img  class="profile-picture" alt="Profile Picture"  src="images/' . $row['image'] . '">';
        }
        // // Check if a file was uploaded
        // if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        //   // File was uploaded, retrieve the file from the temporary directory and move it to a new directory
        //   $temp_file = $_FILES['image']['tmp_name'];
        //   $new_file = "./images/" . $_FILES['image']['name'];
        //   move_uploaded_file($temp_file, $new_file);
        //   // Display the uploaded image
        //   echo '<img class="profile-picture"  src="images/' . $new_file . '">';
        // } else {
        //   // No file was uploaded, display the default image
        //   echo '<img class="profile-picture" src="images/blank.png" >';
        // }
        ?>
   
      </div>

    <div class="edit-delete">
      <div class="card-body">
        <div class="edit-delete-div">
          <button data-modal-target="#modal" class="btn-profile  btn-edit">Edit Profile</button>
          <button data-modal-target="#modal-d" class="btn-profile  btn-edit">Delete Account</button>
          <button data-modal-target="#modal-s" class="btn-profile   btn-edit">Subscription Plan</button>

        </div>
      </div>
    </div>

    <div class="profile-info" >
      <h3>Personal Info</h3>
      <div class="card-body">
        <h5 class="card-text"><b>Full Name: </b><?php echo $row['F_Name'] . " " . $row['L_Name']; ?></h5>
        <h5 class="card-text"><b>Gender:</b> <?php echo $row['Gender']; ?></h5>
        <h5 class="card-text"><b>Birthdate:</b> <?php echo $row['Birthdate']; ?></h5>
        <h5 class="card-text"><b>Email:</b> <?php echo $row['Email']; ?> </h5>
      </div>
    </div>
    <div class="calender" >
      <h3>Booked Session</h3>
      <div class="card-body">
        <table id="example1" class="table-profile table-bordered table-striped">
          <thead>
            <tr class='calender-header'>
              <th>Therapist Name</th>
              <th>Status</th>
              <th>Date</th>
              <th>Time From</th>
              <th>Time To</th>
              <th>Request Value</th>
              <th>Take Action</th>
            </tr>
          </thead>
          <tbody class='table-body-row'>
  
            <?php
  
            $sql = "SELECT request.* , patients.Email
            FROM request                           
            LEFT JOIN patients 
            ON request.P_ID = patients.P_ID
            WHERE patients.Email = '$e'";
  
            $result = mysqli_query($con, $sql);

  
            while ($row = mysqli_fetch_assoc($result)) {

              
              $thid = $row["Therapist_ID"];
              
              $query2 = "SELECT Therapist_Name FROM therapists
              WHERE Therapist_ID = '$thid'";

              $result2 = mysqli_query($con, $query2);
              while ($row2 = mysqli_fetch_assoc($result2)) {

                
                
                $TimeFrom = date('h:i A', strtotime($row['TimeFrom']));
                $TimeTo = date('h:i A', strtotime($row['TimeTo']));
                $requestDate = date('F j, Y', strtotime($row['Date']));
                
                $tname = $row2["Therapist_Name"];
                
                $today = date('F j, Y');;
                 if($requestDate < $today){
                   $row["Status"] = "Finished";
                 }
              echo "<tr class='table-row' >";
              echo "<td> " . $tname . "</td>";
              echo "<td> " . $row["Status"] . "</td>";
              echo "<td> " . $requestDate . "</td>";
              echo "<td> " . $TimeFrom . "</td>";
              echo "<td> " . $TimeTo. "</td>";
              echo "<td> " . $row["Request_Value"] . "</td>";
              echo "<td><a class='linkCancel' href='cancelsession.php?requestid=" . $row['Request_Id'] ." ><button class='btnCancel ' type='button'> Cancel</button></a></td>";
              echo "</tr>";
            }
          }
  
            mysqli_close($con);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  


  <div class='modal-s' id='modal-s'>
  
  <?php
            include('connection.php');

            $sqql = "SELECT * FROM sub_plan WHERE Sub_ID = '$sid' AND Sub_ID IS NOT NULL ";

            $r = mysqli_query($con, $sqql);


            if(mysqli_num_rows($r) == 1){
            $row = mysqli_fetch_assoc($r);
            echo "<h3 class='modal-header' >Subscription Plan: " . $row['status'] .  "</h3>";
            echo "<h3 class='modal-header' >Start Date: " . $row['Start_Date'] .  "</h3>";
            echo "<h3 class='modal-header' >End Date: " . $row['End_Date'] .  "</h3>";

          }else{  

           echo "<h3 class='modal-header' >Subscription Plan: NOT SUBSCRIBED <a href='subplan.php'> <button class='btn-profile  btn-edit'>Subscription Plan</button> </a> </h3>";

           }

  ?>
</div>





  
  <div class="modal" id="modal" >
            <h3 class="modal-header">Update Profile</h3>
          <form method="POST" enctype='multipart/form-data'>
                  <label for="fname">First Name</label>
                  <input required  type="text" name="fname" class="form-control" value=<?php echo $firstname ?>>
                  <label for="lname">Last Name</label>
                  <input  required type="text" name="lname" class="form-control"value=<?php echo $lastname ?>>
                <label for="gender">Gender</label>
                <select required  name='gender' class="form-select" id="gender">
                  <option selected>Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                <label for="bd">Birthdate</label>
                <input required  type="date" name="bd" class="form-control"value=<?php echo $bd ?>>
                <label for="email">Email</label>
                <input  required type="email" name="email" class="form-control"value=<?php echo $pemail?>>
                <label for="pw">Password</label>
                <input required  type="password" name="pw" class="form-control">
                <label for="image">Profile Picture</label>
                <input required  type="file" name="image" accept="image/*"  class="form-control">
              <button type="submit" name="edit" class="btn btn-primary">Update Profile</button>
          </form>
    </div> 



    <?php

    include('connection.php');

    if (isset($_POST['edit'])) {
      $fname = mysqli_real_escape_string($con, $_POST['fname']);
      $lname = mysqli_real_escape_string($con, $_POST['lname']);
      $gender = mysqli_real_escape_string($con, $_POST['gender']);
      $birthdate = mysqli_real_escape_string($con, $_POST['bd']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['pw']);
      // $image = mysqli_real_escape_string($con, $_POST['image']);
      
      
      
      
      if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        // Move the image and CV files to a directory on the server
        $location = "images/";
        // $image_path = "./images/" . $image;
        move_uploaded_file($image_tmp, $location.$image);

        // Update the event data into the database
        $sql = " UPDATE patients SET  F_Name = '$fname',L_Name = '$lname', Gender = '$gender',
     Birthdate = '$birthdate', Email = '$email', Password = '$password', image ='$image'
     WHERE Email = '$e' ";
     

        if (mysqli_query($con, $sql)) {
          echo '<script> alert ("Profile edited successfully!");</script>';
        } else {
          echo "Error editing profile: " . mysqli_error($con);
        }
      }
    }
    ?>


     <div class="modal-d" id="modal-d">
        <h3 class="modal-header">Delete Account</h1>
          <form method="POST">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control">
              <label for="pw">Password</label>
              <input type="password" name="pw" class="form-control">
            <button type="submit" name="delete" class="btn btn-primary">Delete Account</button>
          </form>
      </div>


    <?php

    include('connection.php');

    if (isset($_POST['delete'])) {

      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['pw']);

      // delete account from database
      $sql = "DELETE FROM patients WHERE Email = '$e' ";

      if (mysqli_query($con, $sql)) {
        echo '<script> alert ("Profile deleted successfully!");</script>';
      } else {
        echo "Error deleting profile: " . mysqli_error($con);
      }
    }
    ?>
    
  <div id="overlay"></div>
<!-- <?php include ('./Header-Footer/footer.php')?> -->

<script src="modal.js"></script>
</body>

</html>