<?php
include 'config/connection.php'; 

if(!isset($_SESSION)){
    session_start();
}

//Admin Log in
if(isset($_POST['login'])){

    // $name=$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)==1){
    $_SESSION['name'] = $email;
    header('location:admin_panel/manage/admin/index.php');
}
else{
    echo '<script> alert ("Email or Password is not correct!");</script>';
}
}

//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset( $_SESSION['name']);
    unset($_SESSION['image']);
    header('location:../../../index.php');
    exit();
}
?>