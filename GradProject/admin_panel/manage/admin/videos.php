<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Modal -->
  <div class="modal fade" id="Addvideomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Add Video</h3>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
<form method='POST'>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Video ID</label>
            <input type="text" name="id" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Video Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Video Iframe Code</label>
            <textarea name="url" class="form-control" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="add" class="btn btn-primary">Add Video</button>
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
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $url = mysqli_real_escape_string($con, $_POST['url']);

    // Insert the video data into the database
    $sql = "INSERT INTO videos (V_ID, V_Title, V_Description, url) VALUES ('$id','$title', '$description', '$url')";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Video added successfully!");</script>';
    } else {
      echo "Error adding video: " . mysqli_error($con);
    }
  }
  ?>

   <!-- Modal -->
   <div class="modal fade" id="editvideomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Video</h3>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
<form method='POST'>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Video ID</label>
            <input type="text" name="id" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Video Title</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="">Video Iframe Code</label>
            <textarea name="url" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="edit" class="btn btn-primary">Edit Video</button>
        </div>
      </div>
</form>
    </div>
  </div>

  <?php

	if (isset($_POST['edit'])) {
		// Retrieve the video data
		$id = mysqli_real_escape_string($con, $_POST['id']);
		$title = mysqli_real_escape_string($con, $_POST['title']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		$url = mysqli_real_escape_string($con, $_POST ['url']);
		
			// Update the video data in the database
			$sql = "UPDATE videos SET V_Title ='$title', V_Description='$description', url='$url' WHERE V_ID ='$id'";

			if (mysqli_query($con, $sql)) {
				echo '<script> alert ("Video edited successfully!");</script>';
			} else {
				echo "Error updating video: " . mysqli_error($con);
			}
		}

		mysqli_close($con);
	?>

   <!-- Modal -->
   <div class="modal fade" id="deletevideomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Delete Response</h3>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="">Video ID</label>
                <input type="text" name="id" class="form-control">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="delete" class="btn btn-primary">Delete Video</button>
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
    $sql = "DELETE FROM videos WHERE V_ID = '$id'";

    if (mysqli_query($con, $sql)) {
      echo '<script> alert ("Video deleted successfully!");</script>';
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
            <li class="breadcrumb-item active">Manage Videos </li>
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
            <h3 class="card-title">Manage Videos</h3>
            <div class="md-grid gap-2 d-md-flex justify-content-md-end">
            <a href="#" data-toggle="modal" data-target="#Addvideomodal" class="btn btn-primary">Add New Video</a>
            <a href="#" data-toggle="modal" data-target="#editvideomodal" style='margin:0 1rem;' class="btn btn-primary">Edit Video</a>
            <a href="#" data-toggle="modal" data-target="#deletevideomodal" class="btn btn-primary">Delete Video</a>
            </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Video ID</th>
                  <th>Video Title</th>
                  <th>Description</th>
                  <th>URL</th>
                  <!-- <th>Take Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php

                // Retrieve the video data
                $sql = "SELECT * FROM videos";
                $result = mysqli_query($con, $sql);

                // Output the data in HTML format
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['V_ID'] . "</td>";
                  echo "<td>" . $row['V_Title'] . "</td>";
                  echo "<td>" . $row['V_Description'] . "</td>";
                  echo "<td>" . $row['url'] . "</td>";
                  // echo "<td><a href='edit_video.php?id=" . $row['V_ID'] . "'>Edit</a> | <a href='delete_video.php?id=" . $row['V_ID'] . "'>Delete</a></td>";
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