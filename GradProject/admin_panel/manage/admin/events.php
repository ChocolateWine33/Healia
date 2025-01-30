<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Modal -->
  <div class="modal fade" id="Addeventmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Add Event</h3>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="">Event ID</label>
                <input type="text" name="id" class="form-control">
              </div>
              <div class="col">
                <label for="">Event Title</label>
                <input type="text" name="title" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for=""> Date</label>
              <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="">Time</label>
              <input type="time" name="time" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" name="address" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="add" class="btn btn-primary">Add Event</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="editeventmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Event</h3>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="">Event ID</label>
                <input type="text" name="id" class="form-control">
              </div>
              <div class="col">
                <label for="">Event Title</label>
                <input type="text" name="title" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="">Event Date</label>
              <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="">Time</label>
              <input type="time" name="time" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" name="address" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="edit" class="btn btn-primary">Edit Event</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="deleteeventmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Delete Event</h3>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="">Event ID</label>
                <input type="text" name="id" class="form-control">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="delete" class="btn btn-primary">Delete Event</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php

  include('config/connection.php');

  if (isset($_POST['add'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $description = mysqli_real_escape_string($con, $_POST['description']);


    // Insert the event data into the database
    $sql = "INSERT INTO events (Event_ID , Event_Title,Date,time, Address,Description)
     VALUES ('$id','$title','$date', '$time' ,'$address','$description')";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Event added successfully!");</script>';
    } else {
      echo "Error adding video: " . mysqli_error($con);
    }
  }
  ?>

  <?php

  include('config/connection.php');

  if (isset($_POST['edit'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $description = mysqli_real_escape_string($con, $_POST['description']);


    // Update the event data into the database
    $sqle = "UPDATE events SET  Event_Title = '$title', Date = '$date',
  time = '$time', Address = '$address',Description = '$description' WHERE Event_ID = '$id'";

    if (mysqli_query($con, $sqle)) {
      echo '<script> alert ("Event edited successfully!");</script>';
    } else {
      echo "Error editing event: " . mysqli_error($con);
    } 
  }
  ?>

  <?php

  include('config/connection.php');

  if (isset($_POST['delete'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);

    // delete event from database
    $sql = "DELETE FROM events WHERE Event_ID = '$id'";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Event deleted successfully!");</script>';
    } else {
      echo "Error deleting video: " . mysqli_error($con);
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
            <li class="breadcrumb-item active"> Manage Subscription Plan</li>
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
            <h3 class="card-title">Manage Events</h3>
            <div class="md-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" data-toggle="modal" data-target="#Addeventmodal" class="btn btn-primary me-md-2">Add New Event</a>
              <a href="#" data-toggle="modal" data-target="#editeventmodal" style='margin:0 1rem;' class="btn btn-primary me-md-2">Edit Event</a>
              <a href="#" data-toggle="modal" data-target="#deleteeventmodal" class="btn btn-primary">Delete Event</a>
            </div>


          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Event ID</th>
                  <th>Event Title</th>
                  <th>Event Date</th>
                  <th>Event Time</th>
                  <th>Event Address</th>
                  <th>Description</th>
                  <!-- <th>Take Action</th> -->

                </tr>
              </thead>
              <tbody>
                <?php

                // Retrieve the video data
                $sql = "SELECT * FROM events";
                $result = mysqli_query($con, $sql);

                // Output the data in HTML format
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['Event_ID'] . "</td>";
                  echo "<td>" . $row['Event_Title'] . "</td>";
                  echo "<td>" . $row['Date'] . "</td>";
                  echo "<td>" . $row['time'] . "</td>";
                  echo "<td>" . $row['Address'] . "</td>";
                  echo "<td>" . $row['Description'] . "</td>";

                  // echo "<td><a href='edit_event.php?id=" . $row['Event_ID'] . "'>Edit</a> | <a href='delete_event.php?id=" . $row['Event_ID'] . "'>Delete</a></td>";
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