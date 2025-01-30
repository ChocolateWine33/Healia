<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Modal -->
  <div class="modal fade" id="takeaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel" >Take Action</h1>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


        <div class="modal-body">
          <form method="POST">
            <div class="form-group">
              <label for="">Therapist ID</label>
              <input type="text" name="id" class="form-control" required>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="accept" name="accept" class="btn btn-success">Accept</button>
          <button type="submit" id="reject" name="reject" class="btn btn-danger">Reject</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  if (isset($_POST['accept'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);

    //  Accept therapist join request
    $sql = "UPDATE therapists SET Is_Accepted = 'Accepted' WHERE Therapist_ID = '$id'";

    if (mysqli_query($con, $sql)) {

      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Join Request Accepted successfully!
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>';
    } else {
      echo "Error accepting request: " . mysqli_error($con);
    }
  }
  ?>

  <?php

  if (isset($_POST['reject'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $action = "Rejected";

    // Reject therapist join request 
    $sql = "UPDATE therapists SET Is_Accepted = 'Rejected' WHERE Therapist_ID = '$id'";

    if (mysqli_query($con, $sql)) {

      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Join Request rejected!
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>';
    } else {
      echo "Error deleting Request: " . mysqli_error($con);
    }
  }
  ?>

  <!-- Modal -->
  <div class="modal fade" id="remove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Removing Therapist</h1>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>


        <div class="modal-body">
          <form method="POST">
            <div class="form-group">
              <label for="">Therapist ID</label>
              <input type="text" name="id" class="form-control" required>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="remove" class="btn btn-danger">Remove</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  if (isset($_POST['remove'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);



      //  delete therapist 
      $sql = "DELETE FROM therapists WHERE Therapist_ID = '$id'";

      if (mysqli_query($con, $sql)) {
        // echo '<script> alert ("Therapist Removed successfully!");</script>';
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Therapist Removed!
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>';
      } else {
        echo "Error removing therapist: " . mysqli_error($con);
      }
  }
  ?>

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Therapists</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Therapists Join Requests</h3>
            <div class="md-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" data-toggle="modal" style='margin-right:1rem;'  data-target="#takeaction" class="btn btn-primary">Take Action</a>
              <a href="#" data-toggle="modal" data-target="#remove" class="btn btn-primary">Remove Therapist</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Therapist ID</th>
                  <th>Therapist image</th>
                  <th>Therapist Name</th>
                  <th>Qualification</th>
                  <th>Specialization</th>
                  <th>Experience</th>
                  <th>CV</th>
                  <th>Hour Rate</th>
                  <th>Status</th>
                  <th>Gender</th>
                  <th>Birthdate</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                </tr>
              </thead>
              <tbody>

                <?php

                  // Get the therapist ID from the query string
                  // $therapist_id = $_GET['Therapist_ID'];

                $sql =  "SELECT * FROM therapists ";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td> " . $row["Therapist_ID"] . "</td>";
                  echo "<td>" . '<img width="150" height="150" src="../../../therapists/' . $row["Therapist_Image"] . '">' . "</td>";
                  echo "<td> " . $row["Therapist_Name"] . "</td>";
                  echo "<td> " . $row["qualification"] . "</td>";
                  echo "<td> " . $row["specialization"] . "</td>";
                  echo "<td> " . $row["experience"] . "</td>";
                  echo "<td><a href='/Healia/" . $row["cv"] . "' target='_blank'>" .  "View</a></td>";        
                  echo "<td> " . $row["Hour_Rate"] . "</td>";
                  echo "<td> " . $row["Is_Accepted"] . "</td>";
                  echo "<td> " . $row["Gender"] . "</td>";
                  echo "<td> " . $row["Birthdate"] . "</td>";
                  echo "<td> " . $row["Email"] . "</td>";
                  echo "<td> " . $row["phonenumber"] . "</td>";
                  echo "</tr>";
                }
                mysqli_close($con);

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>