<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

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
            <li class="breadcrumb-item active"> Requests </li>
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
            <h3 class="card-title">Session Requests </h3> 
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Request ID</th>
                  <th>Therapist ID</th>
                  <th>Patient ID</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Time From</th>
                  <th>Time To</th>
                  <th>Request Value</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $sql = "SELECT * FROM request";
                  $result = mysqli_query($con, $sql);
                  
                  while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr><td> " . $row["Request_Id"] . "</td>";
                      echo "<td> " . $row["Therapist_ID"] . "</td>";
                      echo "<td> " . $row["P_ID"] . "</td>";
                      echo "<td> " . $row["Status"] . "</td>";
                      echo "<td> " . $row["Date"] . "</td>";
                      echo "<td> " . $row["TimeFrom"] . "</td>"; 
                      echo "<td> " . $row["TimeTo"] . "</td>"; 
                      echo "<td> " . $row["Request_Value"] . "</td> </tr>";

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