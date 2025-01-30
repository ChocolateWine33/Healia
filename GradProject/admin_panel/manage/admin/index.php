<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
include('config/logform.php');
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
            <li class="breadcrumb-item active">Dashboard </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $sql = "SELECT COUNT(*) FROM patients";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              echo "<h3>" . $row['0'] . "</h3>";
              ?>
              <p>Registered Patients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>

            </div>
            <a href="registered.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              
              <?php
              $sql = "SELECT COUNT(*) FROM request";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              echo "<h3>" . $row['0'] . "</h3>";
              ?>

              <p>Patients Requests</p>
            </div>
            <div class="icon">
              <!-- <i class="fas fa-user-chart"></i> -->
              <i class="fas fa-share"></i>
            </div>
            <a href="viewrequests.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">

            <?php
              $sql = "SELECT COUNT(*) FROM patients WHERE  Sub_ID IS NOT NULL";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              echo "<h3>" . $row['0'] . "</h3>";
              ?>

              <p>Subscription Plan</p>
            </div>
            <div class="icon">
              <i class="fas fa-check-circle"></i>
            </div>
            <a href="registered.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
            <?php
              $sql = "SELECT COUNT(*) FROM therapists WHERE Is_Accepted = 'Accepted'";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              echo "<h3>" . $row['0'] . "</h3>";
              ?>

              <p>Therapists</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="therapists.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>

  <?php
  include('includes/footer.php');
  ?>