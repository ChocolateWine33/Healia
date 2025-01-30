<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Payment</title>
</head>

<body>
    <?php
    // Check if the payment exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
    ?>
        <h1>Payment Successful</h1>

        <p>Card Number: <?php echo $row['Card_no']; ?></p>
        <p>Expiry Date: <?php echo $row['expiry_date']; ?></p>
        <p>CVV: <?php echo $row['cvv']; ?></p>
        <p>Name on Card: <?php echo $row['name']; ?></p>
        <p>Amount: <?php echo $row['Total_Value']; ?></p>

    <?php
    } else {
        // Payment not found
        $error = 'Payment not found';
    }
    ?>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>

</html>