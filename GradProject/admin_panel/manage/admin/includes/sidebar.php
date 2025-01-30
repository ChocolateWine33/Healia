<?php
include('config/logform.php');
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Healia Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="assets/dist/img/admin.png" class="img-circle elevation-2" alt="Admin Image"> -->
        <?php
    $sql = "SELECT image FROM admin";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
    if (mysqli_query($con, $sql)) {
        echo '<img class="img-circle elevation-2" alt="Admin Image" src="assets/dist/img/' . $row['image'] . '">'; 
      } else {
        echo "Error retrieving image: " . mysqli_error($con);
      }
    }
      ?>
      </div>

      <div class="info">
        <!-- <a href="#" class="d-block">Nada Sabry</a> -->
        <a href="adminprofile.php" class="d-block">
        <?php
        if (isset($_SESSION['name'])) {
          echo $_SESSION['name'];
        }
        ?>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class 
          with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
              Patients
              <i class="  fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="registered.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Registration</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="viewrequests.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Requests</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="trackpay.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Payment</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>
              Therapists
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="therapists.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Join Requests</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="rating.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display Rating</p>
                </a>
              </li> -->
            <li class="nav-item">
              <a href="schedule.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Schedule</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Subscription Plan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="book.php" class="nav-link">
                <i class="nav-icon fas fa-book-reader"></i>
                <p>Book Discussion Club </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="events.php" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>Events</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="group.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Group Therapy</p>
              </a>
            </li>
          </ul>

        <li class="nav-item">
          <a href="videos.php" class="nav-link">
            <i class="nav-icon fas fa-video"></i>
            <p>Manage Videos</p>
          </a>

        <li class="nav-item">
          <a href="feedback.php" class="nav-link">
            <i class="nav-icon fas fa-comment-alt"></i>
            <p>Feedback</p>
          </a>

        <li class="nav-item menu-open">
          <a href="index.php?logout='1'"  class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt" ></i>
            <p> Log Out</p>
          </a>
        </li>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>