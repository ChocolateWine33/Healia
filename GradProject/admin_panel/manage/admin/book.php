  <?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Modal -->
  <div class="modal fade" id="Addclubmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Add Club</h3>
        </div>
        <form action="" method='POST'>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for=""> Club ID</label>
              <input type="text" name="id" class="form-control" required>
            </div>

            <div class="col">
              <label for="">Book Title</label>
              <input type="text" name="title" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="">Book Image</label>
            <input type="file" name="image" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="">Date</label>
            <input type="date" name="date" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Time</label>
            <input type="time" name="time" class="form-control" required>
          </div>


          <div class="form-group">
            <label for="">Discussion URL</label>
            <textarea name="url" class="form-control" required></textarea>
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
    $image = mysqli_real_escape_string($con, $_POST['image']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $url = mysqli_real_escape_string($con, $_POST['url']);

    // Insert the club data into the database
    $sql = "INSERT INTO book_discussion_club (Book_ID, Book_image,Book_Name ,Description, date, time,url)
     VALUES ('$id','$image','$title', '$description','$date','$time', '$url')";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Book Discussion Club added successfully!");</script>';
    } else {
      echo "Error adding Book Discussion Club: " . mysqli_error($con);
    }
  }
  ?>
  <!-- Modal -->
  <div class="modal fade" id="editclubmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Club</h3>
        </div>
        <form method="POST" enctype="multipart/form-data">
          <div class="modal-body" >
            <div class="row">
              <div class="col">
                <label for=""> Club ID</label>
                <input type="text" name="id" class="form-control" required>
              </div>

              <div class="col">
                <label for="">Book Title</label>
                <input type="text" name="title" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="">Book Image</label>
              <input type="file" name="image" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control" required></textarea>
            </div>
          
          <div class="form-group">
            <label for="">Date</label>
            <input type="date" name="date" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Time</label>
            <input type="time" name="time" class="form-control" required>
          </div>

            <div class="form-group">
              <label for="">Discussion URL</label>
              <textarea name="url" class="form-control" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="edit" class="btn btn-primary">Edit Club</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php


  if (isset($_POST['edit'])) {
  // include('config/connection.php');
  
    $id = (int) $_POST['id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $url = mysqli_real_escape_string($con, $_POST['url']);
   
    
    if (isset($_FILES['image'])) {
      $image = $_FILES['image']['name'];
      $image_tmp = $_FILES['image']['tmp_name'];

      // Move the image and CV files to a directory on the server
      $location = "../../../images/";
      // $image_path = "./images/" . $image;
      move_uploaded_file($image_tmp, $location.$image);

    // Update the club data into the database
    $sqle = "UPDATE book_discussion_club SET Book_image = '$image', Book_Name = '$title', Description = '$description', date = '$date', time = '$time', url = '$url' WHERE Book_ID = '$id' ";

    if (mysqli_query($con, $sqle)) {
      echo '<script> alert ("Club edited successfully!");</script>';
    } else {
      echo "Error editing club: " . mysqli_error($con);
    }
  }
  }
  ?>

  <!-- Modal -->
  <div class="modal fade" id="deleteclubmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Delete Club</h3>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="">Club ID</label>
                <input type="text" name="id" class="form-control">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="delete" class="btn btn-primary">Delete Club</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  include('config/connection.php');

  if (isset($_POST['delete'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);

    // Delete club from database
    $sql = "DELETE FROM book_discussion_club WHERE  Book_ID = '$id'";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Club deleted successfully!");</script>';
    } else {
      echo "Error deleting Club: " . mysqli_error($con);
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
            <h3 class="card-title">Manage Book Dicussion Club</h3>
            <div class="md-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" data-toggle="modal" data-target="#Addclubmodal" class="btn btn-primary">Add New Club</a>
              <a href="#" data-toggle="modal" data-target="#editclubmodal" style='margin:0 1rem;' class="btn btn-primary">Edit Club</a>
              <a href="#" data-toggle="modal" data-target="#deleteclubmodal" class="btn btn-primary">Delete Club</a>
            </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Club ID</th>
                  <th>Book Image</th>
                  <th>Book Title</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Discussion URL</th>
                  <!-- <th>Take Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php

                // Retrieve the video data
                $sql = "SELECT * FROM book_discussion_club";
                $result = mysqli_query($con, $sql);

                // Output the data in HTML format
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['Book_ID'] . "</td>";
                  echo "<td>" . $row['Book_image'] . "</td>";
                  echo "<td>" . $row['Book_Name'] . "</td>";
                  echo "<td>" . $row['Description'] . "</td>";
                  echo "<td>" . $row['date'] . "</td>";
                  echo "<td>" . $row['time'] . "</td>";
                  echo "<td>" . $row['url'] . "</td>";
                  // echo "<td><a href='edit_club.php?id=" . $row['Book_ID'] . "'>Edit</a> | <a href='delete_club.php?id=" . $row['Book_ID'] . "'>Delete</a></td>";
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