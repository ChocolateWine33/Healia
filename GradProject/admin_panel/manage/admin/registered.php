<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Modal -->
<div class="modal fade" id="Addusermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" placeholder="Name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
            <li class="breadcrumb-item active">Patients </li>
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
            <h3 class="card-title">Registered Patients</h3>
          <!-- <a href="#" data-toggle="modal" data-target="#Addusermodal" class="btn btn-primary">Update</a> 
          <a href="#" data-toggle="modal" data-target="#Addusermodal" class="btn btn-primary">Delete</a>  -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Patient ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Birthdate</th>
                  <th>Email</th>
                  <th>Subscription ID</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $sql = "SELECT * FROM patients";
                  $result = mysqli_query($con, $sql);
                  
                  while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr><td> " . $row["P_ID"] . "</td>";
                      echo "<td> " . $row["F_Name"] . "</td>";
                      echo "<td> " . $row["L_Name"] . "</td>";
                      echo "<td> " . $row["Gender"] . "</td>";
                      echo "<td> " . $row["Birthdate"] . "</td>";
                      echo "<td> " . $row["Email"] . "</td>"; 
                      echo "<td> " . $row["Sub_ID"] . "</td></tr>";
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