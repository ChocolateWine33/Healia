
<?php
include 'connection.php'; 

if(!isset($_SESSION)){
    session_start();
}

//Therapist Log in
if(isset($_POST['login'])){

    $em = $_POST['email'];
    $pw = $_POST['password'];

$sql = "SELECT Therapist_ID FROM therapists WHERE Email = '$em' AND Password = '$pw' ";
$result = mysqli_query($con,$sql);

if( mysqli_num_rows($result) == 1){

    // Get user or therapist information from query result
    $row = mysqli_fetch_assoc($result);
    $tid = $row['Therapsit_ID'];
    session_start();
    $_SESSION['tid'] = $tid;
    $_SESSION['loggedin'] = true;
    $_SESSION['name'] = $em;
    $_SESSION['role'] = "therapist";
    
    header('location:index.php');
   
  } else {
    echo "<script> 
            document.getElementById('message').textContent= 'Email and/or Password are incorrect!';
        </script>";;
}
}

//Patient Log in
if(isset($_POST['login'])){

    $e = $_POST['email'];
    $p = $_POST['password'];   

$q = "SELECT P_ID FROM patients WHERE Email = '$e' AND Password = '$p' ";
$r = mysqli_query($con,$q);

if( mysqli_num_rows($r) == 1){

    // Get user or therapist information from query result
    $row = mysqli_fetch_assoc($r);
    $pid = $row['P_ID'];
    $_SESSION['loggedin'] = true;
    $_SESSION['name'] = $e;
    $_SESSION['pid'] = $pid;
    $_SESSION['role'] = "patient";
  
    header('location:index.php');
    exit();
}
else{
    echo "<script> 
            document.getElementById('message').textContent= 'Email and/or Password are incorrect!';
        </script>";
}
}



//Admin Log in
if(isset($_POST['login'])){

    // $name=$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

$sql = "SELECT 	Admin_ID FROM admin WHERE Email = '$email' AND Password = '$password'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)==1){

     // Get user or therapist information from query result
     $row = mysqli_fetch_assoc($result);
     $aid = $row['Admin_ID'];
     $_SESSION['aid'] = $aid;
    $_SESSION['name'] = $email;
    $_SESSION['type'] = "admin";
    header('location:admin_panel/manage/admin/index.php');
}
else{
    echo "<script> 
            document.getElementById('message').textContent= 'Email and/or Password are incorrect!';
        </script>";
}
}

//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset( $_SESSION['name']);
    unset( $_SESSION['role']);
    unset( $_SESSION['loggedin']);
    header('location:login.php');
}
?>

