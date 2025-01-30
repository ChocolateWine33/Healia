<?php include 'connection.php'; ?>

<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['login'])){

    $e = $_POST['email'];
    $p = $_POST['password'];

$q = "SELECT * FROM therapists WHERE Email = '$e' AND Password = '$p'";
$r = mysqli_query($con,$q);

if(mysqli_num_rows($r)==1){
    
    header('location:index.php');
}
else{
    echo '<script> alert ("Email or Password is not correct!");</script>';
}
}
//logout
if(isset($_GET['logout'])){
    session_destroy();
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Log in</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>

<div class="container">
    <form method="POST">
        <label>Email: </label> <br>
        <input type="text" name="email" class="input-box"> <br><br>
        <label>Password</label><br>
        <input type="password" name="password" class="input-box"><br><br>

        <div class="btn">
            <button type="submit" name="login">Log in</button>
        </div>
    </form>
</div>

</body>
</html>