
    <?php
    // Connect to the database
    include('connection.php');
    include ('logform.php');
    // Retrieve patient data from the database
    $e = $_SESSION['name'];
    //$pid = $_SESSION['p_id'];
    
    if (!isset($_SESSION['name'])) {
        echo "<script>alert('You Need to be a User!'); </script>";
        echo "<script>window.location.href = 'login.php'; </script>";  
        exit();
    }
    // Retrieve the video information from the database
    $sql = "SELECT * FROM videos";
    $result = mysqli_query($con, $sql);

?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Videos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
    <link rel="stylesheet" href="video.css">
</head>

<body>
    <?php include ('header.php')?>

    <div class="video-container">

        <?php
        // Display the videos on the page
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div loading="lazy" class="video">';
            echo $row['url']; 
            // echo '<video  src="videos/' . $row['filename'] . '" controls></video>';
            echo '<div class="video-desc">';
            echo '<h2>' . $row['V_Title'] . '</h2>';
            echo '<p>' . $row['V_Description'] . '</p>';
            echo '</div>';
            echo '</div>';
        }

        mysqli_close($con);
        ?>
    </div>

<?php include ('./Header-Footer/footer.php')?>


<?php
    // Connect to the database
    include('connection.php');

    // Retrieve the video information from the database
    $sql = "SELECT * FROM videos";
    $result = mysqli_query($con, $sql);
    ?>
<?php

include ('logform.php');

// Retrieve patient data from the database
$e = $_SESSION['name'];
// $pid = $_SESSION['pid'];

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
  exit();
}

?>
</body>

</html>