<?php

include('connection.php');
include('logform.php');

// Retrieve patient data from the database
$e = $_SESSION['name'];

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}


//session payment
if (isset($_POST['pay'])) {

    $card_number = $_POST['Card_no'];
    $hashed_card_number = hash('sha256', $card_number);
    $expirydate = $_POST['expiry_date'];
    $expirydate_formatted = date('Y-m-1', strtotime($expirydate));
    $cvv = $_POST['cvv'];
    $name_on_card = $_POST['name'];
    $paydate = date('Y-m-d');   //date function generate the current date

    $query1 = "SELECT P_ID FROM patients WHERE Email='$e'";
    $result = mysqli_query($con, $query1);
    $row = mysqli_fetch_assoc($result);
       $patient_id = $row["P_ID"];

       $query2 = "SELECT Request_Value , Request_Id FROM request WHERE P_ID ='$patient_id' ";
       $result2 = mysqli_query($con, $query2);
       $row2 = mysqli_fetch_assoc($result2);
       $value = $row2["Request_Value"];
       $rid = $row2["Request_Id"];

    $sql = "INSERT INTO payment (Card_no, expiry_date, cvv, name,	paydate, Total_Value, Request_Id )
    VALUES ('$hashed_card_number', '$expirydate_formatted ', '$cvv', '$name_on_card', '$paydate', '$value', '$rid')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Payment Successful')</script>";
            echo "<script>window.location.href = 'index.php'; </script>";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="paystyle.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
</head>

<body>
    <?php include('header.php');?>
    <div class='form-container'>
    <form method="POST">
        <div class="form-group">
            <label for="card-number">Card Number</label>
            <input type="text" id="card-number" name="Card_no" placeholder="xxxx xxxx xxxx xxxx" required>
        </div>

        <div class="form-group">
            <label for="expiry-date">Expiry Date</label>
            <input type="month" id="expiry-date" name="expiry_date" placeholder="MM / YY" required>
        </div>

        <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="number" id="cvv" name="cvv" placeholder="123" required>
        </div>

        <div class="form-group">
            <label for="name-on-card">Name on Card</label>
            <input type="text" id="name-on-card" name="name" placeholder="John Doe" required>
        </div>

        <button type="submit" name="pay">Submit Payment</button>

    </form>
    </div>
</body>

</html>