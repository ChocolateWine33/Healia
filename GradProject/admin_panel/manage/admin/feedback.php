<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Modal -->
  <div class="modal fade" id="Addresponsemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Add Response</h3>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for=""> Feedback_ID</label>
            <input type="text" name="id" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Response</label>
            <textarea name="response" class="form-control" required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="add" class="btn btn-primary">Add Response</button>
        </div>
      </div>
    </div>
  </div>

  <?php

  include('config/connection.php');

  if (isset($_POST['add'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $response = mysqli_real_escape_string($con, $_POST['response']);


    // Insert the response into the database
    $sql = "INSERT INTO feedback (Response) VALUES ('$response')
    WHERE Feedback_ID = $id";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Response added successfully!");</script>';
    } else {
      echo "Error adding response: " . mysqli_error($con);
    }
  }
  ?>

  <!-- Modal -->
  <div class="modal fade" id="editresponsemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Response</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for=""> Feedback_ID</label>
            <input type="text" name="id" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Response</label>
            <textarea name="response" class="form-control" required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="edit" class="btn btn-primary">Edit Response</button>
        </div>
      </div>
    </div>
  </div>
  <?php

  include('config/connection.php');

  if (isset($_POST['edit'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $response = mysqli_real_escape_string($con, $_POST['response']);


    // Edit Response into the database
    $sql = "UPDATE feedback SET  Response = '$response'
WHERE Feedback_ID = '$id'";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Response edited successfully!");</script>';
    } else {
      echo "Error editing response: " . mysqli_error($con);
    }
  }
  ?>

  <!-- Modal -->
  <div class="modal fade" id="deleteresponsemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Delete Response</h3>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="">Feedback ID</label>
                <input type="text" name="id" class="form-control">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="delete" class="btn btn-primary">Delete Response</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  include('config/connection.php');

  if (isset($_POST['delete'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);

    // Delete response from database
    $sql = "DELETE FROM feedback WHERE Feedback_ID = '$id'";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Response deleted successfully!");</script>';
    } else {
      echo "Error deleting Response: " . mysqli_error($con);
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
            <li class="breadcrumb-item active">Manage Feedback</li>
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
          <!-- <div class="card-header">
            <h3 class="card-title">Take Action</h3>
            <div class="md-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" data-toggle="modal" data-target="#Addresponsemodal" class="btn btn-primary">Add Response</a>
              <a href="#" data-toggle="modal" data-target="#editresponsemodal" class="btn btn-primary">Edit Response</a>
              <a href="#" data-toggle="modal" data-target="#deleteresponsemodal" class="btn btn-primary">Delete Response</a>
            </div>

          </div> -->
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Feedback_ID</th>
                  <th>P_ID</th>
                  <th>Admin_ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <!-- <th>Response</th> -->
                </tr>
              </thead>

              <tbody>
                <?php

                // Retrieve the feedback data
                $sql = "SELECT * FROM feedback";
                $result = mysqli_query($con, $sql);

                // Output the data in HTML format

                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['Feedback_ID'] . "</td>";
                  echo "<td>" . $row['P_ID'] . "</td>";
                  echo "<td>" . $row['Admin_Id'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['subject'] . "</td>";
                  echo "<td>" . $row['message'] . "</td>";
                  echo "<td>" . $row['Response'] . "</td>";
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


Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore doloribus eaque, quidem voluptatibus repellendus iste, et nisi vel deserunt laboriosam corrupti ratione ad at reprehenderit temporibus quae neque! Numquam, laudantium.