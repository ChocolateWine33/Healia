<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
include ('config/logform.php');
?>
<style>
  .containerr{
    align-items: center;
  }
  h5{
    margin-top: 20px;
    padding-left: 30px;
  }
   #name{
     margin-top: 50px;
   }
  #photo{
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: 50px;
    margin-right: 30px;
    float: left;
  }
  #title{
    margin-top: 10px;
  }
  </style>

<div class="content-wrapper">
<div class="modal fade" id="updateprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile Data</h1>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        
        <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
          </div>
        </div>

        <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
          </div>
        </div>

        <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" >
          </div>
        </div>

        <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="accept" name="edit" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  include('config/connection.php');

  if (isset($_POST['edit'])) {

    $image = mysqli_real_escape_string($con, $_POST['image']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    // Update the event data into the database
    $sql = "UPDATE admin SET  image = '$image',Admin_Name = '$name', 
  Email = '$email', Password = '$password' WHERE Admin_ID = '$id'";

    if (mysqli_query($con, $sql)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Updated successfully!
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>';
    } else {
      echo "Error updating data: " . mysqli_error($con);
    }
  }
  ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Your Profile</li>
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
                        <h3 id="title" class="card-title"><b>Profile Data</b></h3>
                        <div class="md-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" data-toggle="modal" data-target="#updateprofile" class="btn btn-primary">Update Profile Data</a>
            </div>
          </div>
               <div class="container" class="containerr">
               
                                <?php

                                // Retrieve admin data
                                $sql = "SELECT * FROM admin";
                                $result = mysqli_query($con, $sql);

                                // Output the data in HTML format
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<img id="photo" width="150" height="150" src="assets/dist/img/' . $row["image"] . '">';
                                    echo "<h5 id='name'><b>Name:</b> " . $row['Admin_Name'] . "</h5>";
                                    echo "<h5><b>Email:</b> " . $row['Email'] . "</h5>";
                                }

                                mysqli_close($con);
                                ?>
                              </div>
                  

                    </div>
                    <!-- /.card-header -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php')
?>