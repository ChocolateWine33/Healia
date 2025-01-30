<?php
include('connection.php');
include('logform.php');

// Retrieve patient data from the database
$e = $_SESSION['name'];
//  $tid = $_SESSION['tid'] ;

if (!isset($_SESSION['name'])) {
    echo "<script>alert('You Need to be a User!'); </script>";
    echo "<script>window.location.href = 'login.php'; </script>";
    exit();
}

$sql =  "SELECT * FROM patients WHERE Email ='$e'";

$result = $con->query($sql);
$row = $result->fetch_assoc();

//$patientid = $row['P_ID'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Send Feedback</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="sendfb.css">
    <link  rel="stylesheet" href="./Header-Footer/headerfooter.css">

</head>

<body>
    <?php include ('header.php')?>

    <div class="container">
        <img src="../images/bb.jpg" alt="">
        <form class='fdbck-form' method="post">
            <h1>Send Feedback</h1>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit" name="send">Send</button>
        </form>
    </div>
    <?php
    include('connection.php');
    include('logform.php');


    if (isset($_POST['send'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $sql = "INSERT INTO feedback (name, email, subject, message , P_ID) VALUES ('$name', '$email', '$subject', '$message' , '$patientid')";

        if (mysqli_query($con, $sql)) {
            echo '<script> alert ("Feedback sent successfully!");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);
    }
    ?>

    <?php include './Header-Footer/footer.php'?>


    </body>

    </html>