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
            <h3 class="card-title">Track Payment</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                 <th>Name on Card</th>
                  <th>Card number</th>
                  <th>Expiry date</th>
                  <th>CVV</th>
                  <th>Payment date</th>
                  <th>Total Value</th>
                  <th>Request Id</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $sql = "SELECT * FROM payment";
                  $result = mysqli_query($con, $sql);
                  
                  while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr><td> " . $row["name"] . "</td>";
                      echo "<td> " . $row["Card_no"] . "</td>";
                      echo "<td> " . $row["expiry_date"] . "</td>";
                      echo "<td> " . $row["cvv"] . "</td>";
                      echo "<td> " . $row["paydate"] . "</td>";
                      echo "<td> " . $row["Total_Value"] . "</td>";
                      echo "<td> " . $row["Request_Id"] . "</td></tr>"; 
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