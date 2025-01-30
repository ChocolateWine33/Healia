<?php
include('connection.php');
include('logform.php');


// Retrieve patient data from the database
$e = $_SESSION['name'];

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
  exit();
}

$sql = "SELECT * FROM patients WHERE Email  = '$e'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$firstname = $row['F_Name'];
$lastname = $row['L_Name'];
$g = $row['Gender'];
$bd = $row['Birthdate'];
$pemail = $row['Email'];
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
</head>

<body>
<?php include('Header-Footer/header.php');?>
  <div class="card mb-3" style="max-width: 1450px; margin: 0 25px 0 25px">
    <div class="row g-0">
      <div class="col-md-4">
        <?php
        // Check if a file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
          // File was uploaded, retrieve the file from the temporary directory and move it to a new directory
          $temp_file = $_FILES['image']['tmp_name'];
          $new_file = "images/" . $_FILES['image']['name'];
          move_uploaded_file($temp_file, $new_file);
          // Display the uploaded image
          echo '<img width="200" height="200" src="images/' . $new_file . '">';
        } else {
          // No file was uploaded, display the default image
          echo '<img src="images/blank.png" width="200" height="200" >';
        }
        ?>
        <!-- <?php echo '<img class="img-fluid rounded-start" alt="Profile Picture" width="200" height="200"  src="therapists/' . $row['image'] . '">'; ?> -->
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title" style="margin-left: -200px;">Your Profile</h3><br>
          <div class="d-grid gap-2 col-2 mx-auto" style="margin-right: -100px; float:right; margin-bottom: -50px">
            <a href="#" data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-success">Edit Profile</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#delete" class="btn btn-secondary">Delete Account</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card text-bg-light mb-3" style="width: 30rem ;margin-left: -100px;float:left;">
      <div class="card-header"><b>Personal Info</b></div>
      <div class="card-body">
        <h5 class="card-text"><b>Full Name: </b><?php echo $row['F_Name'] . " " . $row['L_Name']; ?></h5>
        <h5 class="card-text"><b>Gender:</b> <?php echo $row['Gender']; ?></h5>
        <h5 class="card-text"><b>Birthdate:</b> <?php echo $row['Birthdate']; ?></h5>
        <h5 class="card-text"><b>Email:</b> <?php echo $row['Email']; ?> </h5>
        <h5 class="card-text"><b>Subscription Plan:</b> <?php  ?> </h5>
      </div>
    </div>


    <div class="card text-bg-light mb-3" style="width: 50rem ;margin-right: -100px; float:right;">
      <div class="card-header"><b>Booked Session</b></div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>

              <th>Therapist Name</th>
              <th>Status</th>
              <th>Date</th>
              <th>Time From</th>
              <th>Time To</th>
              <th>Request Value</th>
              <th>Take Action</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $sql = "SELECT request.* , patients.Email
            FROM request                           
            LEFT JOIN patients 
            ON request.P_ID = patients.P_ID
            WHERE patients.Email = '$e'";

            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {

              $TimeFrom = date('h:i A', strtotime($row['TimeFrom']));
              $TimeTo = date('h:i A', strtotime($row['TimeTo']));
              $requestDate = date('F j, Y', strtotime($row['Date']));
              $thid = $row["Therapist_ID"];

              $query2 = "SELECT Therapist_Name FROM therapists
              WHERE Therapist_ID = '$thid'";
               $result2 = mysqli_query($con, $query2);
               while ($row2 = mysqli_fetch_assoc($result2)) {
                $tname = $row2["Therapist_Name"];

               echo "<td> " . $tname . "</td>";
              //  echo "<tr><td> " . $row["Request_Id"] . "</td>";
              echo "<td> " . $row["Request_Id"] . "</td>";
              echo "<td> " . $row["Status"] . "</td>";
              echo "<td> " . $requestDate . "</td>";
              echo "<td> " . $TimeFrom . "</td>";
              echo "<td> " . $TimeTo . "</td>";
              echo "<td> " . $row["Request_Value"] . "</td>";
              echo '<td><div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-warning me-md-2"  data-bs-toggle="modal" data-bs-target="#rating" type="button">Rate</button>
              <button class="btn btn-danger" type="button"><a style= "text-decoration:none;" href="cancelsession.php?requestid=' . $row["Request_Id"] .'" class="text-light"> Cancel</a></button>
            </div></td>';
              echo "<td> " . $row["Rating"] . "</td></tr>";
            }

          }

            mysqli_close($con);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    </aside>

     <!-- Modal -->
     <div class="modal fade" id="rating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Rate Session</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <head>
              <!-- Font Awesome Icon Library -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
              <style>
                .checked {
                  color: orange;
                }
              </style>
            </head>

            <body>
              <h2>Rating Session</h2>
              <form method="POST">
                <input type="hidden" name="rating" id="rating-input">
                <span class="fa fa-star"></span>
                <span  class="fa fa-star"></span>
                <span  class="fa fa-star"></span>
                <span  class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </form>

              <script>
                // Get all the star elements
                var stars = document.querySelectorAll('.fa-star');

                // Add an event listener to each star
                stars.forEach(function(star) {
                  star.addEventListener('click', function() {
                    // Remove checked class from all stars
                    stars.forEach(function(s) {
                      s.classList.remove('checked');
                    });

                    // Add checked class to the clicked star and all preceding stars
                    this.classList.add('checked');
                    var prev = this.previousElementSibling;
                    var rating = 1;
                    while (prev) {
                      prev.classList.add('checked');
                      prev = prev.previousElementSibling;
                      rating++;
                    }

                    // Set the rating input value to the number of checked stars
                    document.getElementById('rating-input').value = rating;
                  });
                });
              </script>
              <?php

if (isset($_POST['rate'])) {
              // Get rating value from POST data
              $rating = $_POST['rating'];

              // Connect to the database
              include('connection.php');
              include('logform.php');

              $queryy = "SELECT P_ID FROM patients WHERE Email = '$e'";
              $resultt = $con->query($queryy);
              while ($rowss = $resultt->fetch_assoc()) {
                $pid = $rowss["P_ID"];
                $sqlq = "SELECT P_ID FROM request WHERE P_ID = '$pid' ";
                $res = $con->query($sqlq);
                while ($rows = $res->fetch_assoc()) {
                  $patientId = $rows["P_ID"];

                  $sql2 =  "SELECT Status FROM request WHERE P_ID = '$patientId'";
                  $result3 = $con->query($sql2);
                  while ($row = $result3->fetch_assoc()) {
                    $status = $row["Status"];
                    if ($status == 'Completed') {


                      // Insert the rating into the database
                      $sql = "UPDATE request SET Rating = '$rating' WHERE P_ID = '$patientId'";
                      $result = mysqli_query($con, $sql);

                      if ($result) {
                        // Success message
                        echo "Rating submitted successfully";
                      } else {
                        // Error message
                        echo "Error submitting rating: " . mysqli_error($con);
                      }
                    }
                  }
                }
              }
            }
         
              ?>
            </body>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" name="rate" class="btn btn-primary">Submit Rating</button>
          </div>
        </div>
      </div>
    </div>

     <!-- Modal -->
     <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h3>
          </div>
          <form method="POST">
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <label for="firsstname">First Name</label>
                  <input type="text" name="fname" class="form-control" autocomplete="off" value=<?php echo $firstname ?>>
                </div>
                <div class="col">
                  <label for="lastname">Last Name</label>
                  <input type="text" name="lname" class="form-control" autocomplete="off" value=<?php echo $lastname ?>>
                </div>
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-select" id="gender" required>
                  <option selected>Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="form-group">
                <label for="bd">Birthdate</label>
                <input type="date" name="bd" class="form-control" autocomplete="off" value=<?php echo $bd ?>>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" autocomplete="off" value=<?php echo $pemail ?>>
              </div>
              <div class="form-group">
                <label for="pw">Password</label>
                <input type="password" name="pw" class="form-control">
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

      $fname = mysqli_real_escape_string($con, $_POST['fname']);
      $lname = mysqli_real_escape_string($con, $_POST['lname']);
      $gender = mysqli_real_escape_string($con, $_POST['gender']);
      $birthdate = mysqli_real_escape_string($con, $_POST['bd']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['pw']);
      $image = mysqli_real_escape_string($con, $_POST['image']);

      if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        // Move the image and CV files to a directory on the server
        $image_path = "therapists/" . $image;
        move_uploaded_file($image_tmp, $image_path);

        // Update the event data into the database
        $sql = "UPDATE patients SET  F_Name = '$fname',L_Name = '$lname', Gender = '$gender',
     Birthdate = '$birthdate', Email = '$email', Password = '$password',image ='$image'
     WHERE Email = '$e'";

        if (mysqli_query($con, $sql)) {
          echo '<script> alert ("Profile edited successfully!");</script>';
        } else {
          echo "Error editing profile: " . mysqli_error($con);
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
</body>

</html>