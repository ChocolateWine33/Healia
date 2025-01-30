<!-- <?php include ('logform.php');?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
</head>
<body>
        <?php include ('header.php')?>
<div class="container">
<img  class='reg-img' src="images/Mental health-amico.png" alt="">
    <form class="login-form" method="POST">
    <h2>Healia Log in</h2>
    <div id='message'></div>
        <label>Email: </label> <br>
        <input type="text" name="email" id="validationCustom01" class="input-box" required>
     <br><br>
        <label>Password:</label><br>
        <input type="password" name="password" id="validationCustom02" class="input-box" required>
    <br><br>

        <div class="btn">
            <button type="submit" name="login">Log in</button>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>

    </form>
    <?php 
include ('logform.php');
 ?>
</div>
</body>
</html>
