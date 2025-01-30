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

$sql =  "SELECT therapists.*, GROUP_CONCAT(phonenumber.Phone SEPARATOR ', ') AS phone_numbers
FROM therapists
LEFT JOIN phonenumber
ON therapists.Therapist_ID = phonenumber.Therapist_Id
WHERE therapists.Email ='$em'";

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

$query = "SELECT * FROM phonenumber"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src= "script.js"></script>
  <!-- <style>
        body{
            background-color: #10b981;
        }
    </style> -->
</head>

<body>
<?php include('Header-Footer/header.php');?>
  <div class="content">
    <div class="card mb-3" style="max-width: 1450px; height:180px; margin: 0 25px 0 25px">
      <div class="row g-0">
        <div class="col-md-4">
          <?php echo '<img class="img-fluid rounded-start" alt="Profile Picture" width="200" height="200"  src="therapists/' . $row['Therapist_Image'] . '">'; ?>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3 class="card-title" style="margin-left: -200px;">Your Profile</h3><br>
            <div class="d-grid gap-2 col-2 mx-auto" style="margin-right: -100px; float:right; margin-bottom: -50px">
              <a href="#" data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-success">Edit Profile</a>
              <a href="#" data-bs-toggle="modal" data-bs-target="#delete" class="btn btn-danger">Delete Account</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="card text-bg-light mb-3" style="width: 30rem ;margin-left: -93px;float:left;">
        <div class="card-header"><b>Personal Info</b></div>
        <div class="card-body">

          <!-- <h5 class="card-text"><b>Therapist_ID:</b> <?php echo $row['Therapist_ID']; ?> </h5> -->
          <h5 class="card-text"><b>Email:</b> <?php echo $row['Email']; ?> </h5>
          <h5 class="card-text"><b>Full Name:</b><?php echo $row['Therapist_Name']; ?></h5>
          <h5 class="card-text"><b>Gender:</b> <?php echo $row['Gender']; ?></h5>
          <h5 class="card-text"><b>Birthdate:</b> <?php echo $row['Birthdate']; ?></h5>
          <h5 class="card-text"><b>Phone Number:</b> <?php echo $row['phone_numbers']; ?></h5>
          <h5 class="card-text"><b>Qualification:</b> <?php echo $row['qualification']; ?></h5>
          <h5 class="card-text"><b>Specialization:</b> <?php echo $row['specialization']; ?></h5>
          <h5 class="card-text"><b>Experience Years:</b> <?php echo $row['experience']; ?></h5>
          <h5 class="card-text"><b>Hour_Rate:</b> <?php echo $row['Hour_Rate']; ?></h5>

        </div>
      </div>

      <div class="card text-bg-light mb-3" style="width: 50rem ;margin-right: -93px; float:right;">
        <div class="card-header"><b>Your Schedule</b></div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
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
                echo "<tr>";
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
          <div class="d-grid gap-2 col-3 mx-auto">
            <a href="#" data-bs-toggle="modal" data-bs-target="#update" class="btn btn-dark">Update Schedule</a>
          </div>
        </div>
      </div>
      </aside>

      <table class="table table-striped">

      </table>

      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
              <div class="modal-body">
                <div class="col">
                  <label for="fullname">Full Name</label>
                  <input type="text" name="fullname" class="form-control" autocomplete="off" value=<?php echo $therapistName ?>>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="gender">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                      <option selected>Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="col">
                    <label for="bd">Birthdate</label>
                    <input type="date" name="bd" class="form-control" autocomplete="off" value=<?php echo $bd ?>>
                  </div>
                </div>
                <div class="col">
                  <label for="qualification">Qualification</label>
                  <textarea type="text" name="qualification" class="form-control" autocomplete="off" value=<?php echo $qual ?>></textarea>
                </div>
                <div class="col">
                  <label for="specialization">Specialization</label>
                  <input type="text" name="specialzation" class="form-control" autocomplete="off" value=<?php echo $spec ?>>
                </div>
                <div class="col">
                  <label for="experience">Experience (Years)</label>
                  <input type="number" name="experience" class="form-control" autocomplete="off" value=<?php echo $exp ?>>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" required autocomplete="off" value=<?php echo $themail ?>>
                </div>
                <div class="form-group">
                  <label for="pw">Password</label>
                  <input type="password" name="pw" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="phone_numbers">Phone Number</label>
                  <input type="text" name="phone_numbers" id="phone_numbers" class="form-control">
                </div>
                <div class="form-group">
                  <label for="hr">Hour_Rate</label>
                  <input type="number" name="hourrate" class="form-control" autocomplete="off" value=<?php echo $hr ?>>
                </div>
                <div class="form-group">
                  <label for="image">Profile Picture</label>
                  <input type="file" name="image" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="edit" class="btn btn-primary">Update Profile</button>
              </div>
            </form>
          </div>
        </div>
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
        $phone_numbers = mysqli_real_escape_string($con, $_POST['phone_numbers']);
        $image = mysqli_real_escape_string($con, $_POST['image']);
        

        if (isset($_FILES['image'])) {
          $image = $_FILES['image']['name'];
          $image_tmp = $_FILES['image']['tmp_name'];
  
          // Move the image and CV files to a directory on the server
          $image_path = "therapists/" . $image;
          move_uploaded_file($image_tmp, $image_path);

        // Update the event data into the database
        $sql = "UPDATE therapists SET  Therapist_Name = '$fullname',Gender = '$gender', Birthdate = '$birthdate',
     qualification = '$qualification',specialization = '$specialization', experience = $experience , 
      Email = '$email', Password = '$password' Therapist_Image = '$image' WHERE Email  = '$em'";

        if (mysqli_query($con, $sql)) {
   
        // Split the new phone numbers into an array
        $phone_numbers_array = explode(",", $phone_numbers);

        // Trim whitespace from each phone number
        $phone_numbers_array = array_map('trim', $phone_numbers_array);
        
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        // Loop through the new phone numbers and update the records
        foreach ($phone_numbers_array as $phone_number) {
          // Prepare the update statement
          $sql = "UPDATE phonenumber SET Phone=CONCAT(Phone, ', $phone_number')
          WHERE (SELECT Email FROM therapists
           WHERE therapists.Email='$em')";
          // Execute the update statement
          if (mysqli_query($con, $sql)) {
            echo  '<script> alert ("Profile edited successfully!");</script>';
          } else {
            echo "Error updating profile: " . mysqli_error($con);
          }
        }
      }
    }
    }

      ?>

      <!-- Modal -->
      <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="pw">Password</label>
                  <input type="password" name="pw" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="delete" class="btn btn-primary">Delete Account</button>
              </div>
            </form>
          </div>
        </div>
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

      <!-- Modal -->
      <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Update Schedule</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label for="email">Date</label>
                  <input type="date" name="date" class="form-control">
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="timefrom">Time From</label>
                    <input type="time" name="timefrom" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="timeto">Time To</label>
                    <input type="time" name="timeto" class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update" class="btn btn-primary">Update Schedule</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php

      include('connection.php');

      if (isset($_POST['update'])) {

        $date = mysqli_real_escape_string($con, $_POST['date']);
        $timefrom = mysqli_real_escape_string($con, $_POST['timefrom']);
        $timeto = mysqli_real_escape_string($con, $_POST['timeto']);

        $sql = "INSERT INTO schedule Values (Date='$date' ,Time_From = '$timefrom' , Time_To = '$timeto')
      SELECT therapists.Email FROM therapists
       WHERE therapists.Email = '$em'";

        if (mysqli_query($con, $sql)) {
          echo '<script> alert ("Schedule Updated successfully!");</script>';
        } else {
          echo "Error updating schedule: " . mysqli_error($con);
        }
      }
      ?>
    </div>
</body>
</html>

