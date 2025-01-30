<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Modal -->
  <div class="modal fade" id="Addgroupmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Add Group</h3>
        </div>
        <form method='POST'>

        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for=""> Group ID</label>
              <input type="text" name="id" class="form-control" required>
            </div>

            <div class="col">
              <label for="">Group Name</label>
              <input type="text" name="title" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label for=""> Date</label>
              <input type="date" name="date" class="form-control" required>
            </div>

            <div class="col">
              <label for="">Time</label>
              <input type="time" name="time" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="">Location</label>
            <input type="text" name="location" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control" required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="add" class="btn btn-primary">Add Club</button>
        </div>
      </div>
</form>
    </div>
  </div>

  <?php
    
  include('config/connection.php');

  if (isset($_POST['add'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $description = mysqli_real_escape_string($con, $_POST['description']);


    // Insert the group data into the database
    $sql = "INSERT INTO group_therapy (Group_ID, Group_Name,date,time,location, G_Description) 
VALUES ('$id','$title','$date','$time','$location','$description')";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Group added successfully!");</script>';
    } else {
      echo "Error adding group: " . mysqli_error($con);
    }
  }
  ?>

  <!-- Modal -->
  <div class="modal fade" id="editgroupmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Add Group</h3>
        </div>
<form method='POST'>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for=""> Group ID</label>
              <input type="text" name="id" class="form-control" required>
            </div>

            <div class="col">
              <label for="">Group Name</label>
              <input type="text" name="title" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label for=""> Date</label>
              <input type="date" name="date" class="form-control">
            </div>

            <div class="col">
              <label for="">Time</label>
              <input type="time" name="time" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="">Location</label>
            <input type="text" name="location" class="form-control">
          </div>

          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="edit" class="btn btn-primary">Edit Group</button>
        </div>
      </div>
</form>
    </div>
  </div>
  <?php

  include('config/connection.php');

  if (isset($_POST['edit'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $location = mysqli_real_escape_string($con, $_POST['location']);;
    $description = mysqli_real_escape_string($con, $_POST['description']);


    // Update the group data into the database
    $sql = "UPDATE group_therapy SET  Group_Name = '$title', date = '$date',
Time = '$time', location = '$location',G_Description = '$description'
WHERE Group_ID = '$id'";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Group edited successfully!");</script>';
    } else {
      echo "Error editing group: " . mysqli_error($con);
    }
  }
  ?>

  <!-- Modal -->
  <div class="modal fade" id="deletegroupmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Delete Club</h3>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="">Group ID</label>
                <input type="text" name="id" class="form-control">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="delete" class="btn btn-primary">Delete Group</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  include('config/connection.php');

  if (isset($_POST['delete'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);

    // Delete group from database
    $sql = "DELETE FROM group_therapy WHERE Group_ID = '$id'";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Group deleted successfully!");</script>';
    } else {
      echo "Error deleting group: " . mysqli_error($con);
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
            <li class="breadcrumb-item active">Manage Subscription Plan</li>
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
            <h3 class="card-title">Manage Group Therapy</h3>
            <div class="md-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" data-toggle="modal" data-target="#Addgroupmodal" class="btn btn-primary">Add New Group</a>
              <a href="#" data-toggle="modal" data-target="#editgroupmodal" style='margin:0 1rem;' class="btn btn-primary">Edit Group</a>
              <a href="#" data-toggle="modal" data-target="#deletegroupmodal" class="btn btn-primary">Delete Group</a>
            </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Group ID</th>
                  <th>Group Name</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Location</th>
                  <th>Description</th>
                </tr>
              </thead>

              <tbody>
                <?php

                // Retrieve the video data
                $sql = "SELECT * FROM group_therapy";
                $result = mysqli_query($con, $sql);

                // Output the data in HTML format

                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['Group_ID'] . "</td>";
                  echo "<td>" . $row['Group_Name'] . "</td>";
                  echo "<td>" . $row['date'] . "</td>";
                  echo "<td>" . $row['time'] . "</td>";
                  echo "<td>" . $row['location'] . "</td>";
                  echo "<td>" . $row['G_Description'] . "</td>";
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
</body>

</html>

<?php
include('includes/footer.php');
?>