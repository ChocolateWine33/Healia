<?php include 'connection.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log in</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="adminlogin.css">
</head>
<body >

<div  class="container">
    <form method="POST">
        <div id='message'></div>
        <label>Email: </label> 
        <input type="text" name="email" class="input-box"> 
        <label>Password</label>
        <input type="password" name="password" class="input-box">
        <div class="btn">
            <button type="submit" name="login">Log in</button>
        </div>
    </form>
</div>


<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['login'])){

    $e = $_POST['email'];
    $p = $_POST['password'];

$q = "SELECT * FROM admin WHERE Email = '$e' AND Password = '$p'";
$r = mysqli_query($con,$q);

if(mysqli_num_rows($r)==1){
    
    header('location:index.php');
}
else{
    echo "<script>
        
        document.getElementById('message').textContent = 'Email and/or Password is wrong!' 
     </script>";
}
}
//logout
if(isset($_GET['logout'])){
    session_destroy();
    header('location:login.php');
}
?>

</body>
</html>