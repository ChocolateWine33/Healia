<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/connection.php');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Therapists</li>
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
                        <h3 class="card-title">View Therapists Schedule</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Schedule ID</th>
                                    <th>Therapist ID</th>
                                    <th>Date</th>
                                    <th>Time_From</th>
                                    <th>Time_To</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // Retrieve the video data
                                $sql = "SELECT * FROM schedule";
                                $result = mysqli_query($con, $sql);

                                // Output the data in HTML format
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['Schedule_ID'] . "</td>";
                                    echo "<td>" . $row['Therapist_Id'] . "</td>";
                                    echo "<td>" . $row['Date'] . "</td>";
                                    echo "<td>" . $row['Time_From'] . "</td>";
                                    echo "<td>" . $row['Time_To'] . "</td>";
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