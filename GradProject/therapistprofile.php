<?php
include('connection.php');
include('logform.php');



// Retrieve patient data from the database
$em = $_SESSION['name'];
//  $tid = $_SESSION['tid'] ;

if (!isset($_SESSION['name'])) {
  // User is not authenticated, redirect to login
  header('Location: login.php');
  exit();
}

$sql =  "SELECT * FROM therapists WHERE Email ='$em'";



$result = $con->query($sql);
$row = $result->fetch_assoc();

$therapistName = $row['Therapist_Name'];
$g = $row['Gender'];
$bd = $row['Birthdate'];
$qual = $row['qualification'];
$spec = $row['specialization'];
$exp = $row['experience'];
$themail = $row['Email'];
$hr = $row['Hour_Rate'];
$pn = $row['phonenumber'];
$thid = $row['Therapist_ID']
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

  <div class="profile-container">
    <div class="image-container">
      <?php echo '<img class="profile-picture"  src="therapists/' . $row['Therapist_Image'] . '">'; ?>
    </div>

    <div class="edit-delete">
      <div class="card-body">
        <div class="edit-delete-div">
              <button href="#" data-modal-target="#modal-te" class="btn-profile btn-success">Edit Profile</button>
              <button href="#" data-modal-target="#modal-td" class="btn-profile btn-danger">Delete Account</button>
              </div>
      </div>
    </div>

    <div class="profile-info">
      <h3>Personal Info</h3>
        <div class="card-body">
          <!-- <h5 class="card-text"><b>Therapist_ID:</b> <?php echo $row['Therapist_ID']; ?> </h5> -->
          <h5 class="card-text"><b>Email:</b> <?php echo $row['Email']; ?> </h5>
          <h5 class="card-text"><b>Full Name:</b><?php echo $row['Therapist_Name']; ?></h5>
          <h5 class="card-text"><b>Gender:</b> <?php echo $row['Gender']; ?></h5>
          <h5 class="card-text"><b>Birthdate:</b> <?php echo $row['Birthdate']; ?></h5>
          <h5 class="card-text"><b>Phone Number:</b> <?php echo $row['phonenumber']; ?></h5>
          <h5 class="card-text therapist-card-text"><b>Qualification:</b> <?php echo $row['qualification']; ?></h5>
          <h5 class="card-text"><b>Specialization:</b> <?php echo $row['specialization']; ?></h5>
          <h5 class="card-text"><b>Experience Years:</b> <?php echo $row['experience']; ?></h5>
          <h5 class="card-text"><b>Hour_Rate:</b>$<?php echo $row['Hour_Rate']; ?></h5>

        </div>
      </div>

      <div class="calender">
        <h3>Your Schedule</h3>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr class='calender-header'>
                <!-- <th> ID</th>  -->
                <th>Date</th>
                <th>Time_From</th>
                <th>Time_To</th>
              </tr>
            </thead>
            <tbody>

              <?php

              // Retrieve the schedule data
              $sql = "SELECT schedule.* , therapists.Email , therapists.Therapist_ID
            FROM schedule
            LEFT JOIN therapists ON schedule.Therapist_Id = therapists.Therapist_ID
            WHERE therapists.Email  = '$em'";

              $result = mysqli_query($con, $sql);

              // Output the data in HTML format
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class='table-row'>";
                // echo "<td>" . $row['Therapist_Id'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['Time_From'] . "</td>";
                echo "<td>" . $row['Time_To'] . "</td>";
                echo "</tr>";
              }

              mysqli_close($con);
              ?>

            </tbody>
          </table>
          <div class="btn-therapist-update" >
            <button href="#" data-modal-target="#modal-tu" data-bs-target="#update" class="btn-profile  ">Update Schedule</button>
          </div>
        </div>
      </div>
      </aside>

      <table class="table table-striped">

      </table>

    </div>
    <div class='modal-s' id='modal-s'>
  
 
    

      <!-- EDIT Modal -->
      <div class="modal-te" id="modal-te" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <h3 class="modal-header fs-5" id="exampleModalLabel">Update Profile</h3>
        <form class='therapist-form' method="POST" enctype='multipart/form-data'>
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" class="form-control" autocomplete="off" value=<?php echo $therapistName ?>>
                  <label for="gender">Gender</label>
                  <select class="form-select" id="gender" name="gender">
                    <option selected>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                  <label for="bd">Birthdate</label>
                  <input type="date" name="bd" class="form-control" autocomplete="off" value=<?php echo $bd ?>>
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" required autocomplete="off" value=<?php echo $themail ?>>
                  <label for="pw">Password</label>
                  <input type="password" name="pw" class="form-control" required>
                <label for="phone_numbers">Phone Number</label>
                <input type="text" name="phonenumber" id="phone_numbers" class="form-control" <?php echo $pn ?>>
                <label for="qualification">Qualification</label>
                <textarea type="text" name="qualification" class="form-control" autocomplete="off"  ><?php echo $qual ?></textarea>
                <label for="specialization">Specialization</label>
                <input type="text" name="specialzation" class="form-control" autocomplete="off" value=<?php echo $spec ?>>
                <label for="experience">Experience (Years)</label>
                <input type="number" name="experience" class="form-control" autocomplete="off" value=<?php echo $exp ?>>
                <label for="hr">Hour_Rate</label>
                <input type="number" name="hourrate" class="form-control" autocomplete="off" value=<?php echo $hr ?>>
                <label for="image">Profile Picture</label>
                <input type="file" name="image" class="form-control">
                <button type="submit" name="edit" class="btn btn-primary">Update Profile</button>
            </form>
      </div>

      <?php

      include('connection.php');

      if (isset($_POST['edit'])) {

        // $tid =  mysqli_real_escape_string($con, $_POST['tid']);
        $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $birthdate = mysqli_real_escape_string($con, $_POST['bd']);
        $qualification = mysqli_real_escape_string($con, $_POST['qualification']);
        $specialization = mysqli_real_escape_string($con, $_POST['specialzation']);
        $experience = mysqli_real_escape_string($con, $_POST['experience']);
        $hourrate = mysqli_real_escape_string($con, $_POST['hourrate']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['pw']);
        $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
        
        if (isset($_FILES['image'])) {
          $image = $_FILES['image']['name'];
          $image_tmp = $_FILES['image']['tmp_name'];
  
          // Move the image and CV files to a directory on the server
          $location = "therapists/";
          // $image_path = "./images/" . $image;
          move_uploaded_file($image_tmp, $location.$image);


        // if (isset($_FILES['image'])) {
        //   $image = $_FILES['image']['name'];
        //   $image_tmp = $_FILES['image']['tmp_name'];
  
        //   // Move the image and CV files to a directory on the server
        //   $image_path = "therapists/" . $image;
        //   move_uploaded_file($image_tmp, $image_path);

        // Update the event data into the database
        $sql = "UPDATE therapists SET  Therapist_Name = '$fullname',Gender = '$gender', Birthdate = '$birthdate',
     qualification = '$qualification',specialization = '$specialization', experience = $experience , 
      Email = '$email', Password = '$password', Therapist_Image = '$image', phonenumber = '$phonenumber' WHERE Email  = '$em'";


   
          // Execute the update statement
          if (mysqli_query($con, $sql)) {
            echo  '<script> alert ("Profile edited successfully!");</script>';
          } else {
            echo "Error updating profile: " . mysqli_error($con);
          }
      }
    }

      ?>

      <!-- DELETE Modal -->
      <div class="modal-td" id="modal-td" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <h3 class="modal-header fs-5" id="exampleModalLabel">Delete Account</h3>
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

        $em = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['pw']);

        // delete the account data from the database
        $sql = "DELETE FROM therapists WHERE Email  = '$em' ";

        if (mysqli_query($con, $sql)) {
          echo '<script> alert ("Profile deleted successfully!");</script>';
          
        } else {
          echo "Error deleting profile: " . mysqli_error($con);
        }
      }
      // header('location:login.php');
      ?>

      <!-- UPDATE Modal -->
      <div class="modal-tu" id="modal-tu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <h3 class="modal-header fs-5" id="exampleModalLabel">Update Schedule</h3>
            <form method="POST" enctype='multipart/form-data'>
                  <label for="email">Date</label>
                  <input type="date" name="date" class="form-control">
                    <label for="timefrom">Time From</label>
                    <input type="time" name="timefrom" class="form-control">
                    <label for="timeto">Time To</label>
                    <input type="time" name="timeto" class="form-control">
                <button type="submit" name="update" class="btn btn-primary">Update Schedule</button>
            </form>
      </div>

      <?php

      include('connection.php');

      if (isset($_POST['update'])) {

        $date = mysqli_real_escape_string($con, $_POST['date']);
        $timefrom = mysqli_real_escape_string($con, $_POST['timefrom']);
        $timeto = mysqli_real_escape_string($con, $_POST['timeto']);

        $sql_1 = "SELECT therapists.Therapist_ID FROM therapists
        WHERE therapists.Email = '$em' ";

        $result = mysqli_query($con, $sql_1);

        while( $row = mysqli_fetch_assoc($result)){
          $thId = $row['Therapist_ID'];

          $sql = "INSERT INTO schedule (Therapist_Id ,Date ,Time_From , Time_To) VALUES ('$thId', '$date', '$timefrom', '$timeto') ";

          if(mysqli_query($con, $sql)){
            echo '<script> alert("Schedule Updated successfully!");</script>';
          }else {
            echo "Error updating schedule: " . mysqli_error($con);
          }
        }


                

      }
      ?> 

    <div id="overlay"></div>
    <script src="modal.js"></script>
</body>
</html>

