<?php 
include ('connection.php'); 
// include ('logform.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="signstyle.css">
    <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
    <title>Register</title>
</head> 
<body>
    <?php include ('header.php')?>
    <div class="container">
        <img class='reg-img' src="images/Mental health-amico.png" alt="image">
            <form class="form-sign" method="POST">
                <h1 id='header' >
                    Register
                    <div id="message" ></div>
                </h1>

                <div class="first">
                    <div>    
                        <label for="f_name">First Name:</label>
                        <input type="text" name="firstname" id="firstname" class="input-box" required>
                    </div>
                    <div class='gender'>          
                        <label for="gender">Gender:</label>

                        <div>
                        <select id="cars" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        </div>                       
                    </div>
                    
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="input-box" required>

                    </div>           
                </div>            
                <div class="second">
                    <div>
                    <label for="l_name">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" class="input-box" required>
                    </div>

                    <div>
                    <label for="bd">Birthdate:</label>
                    <input type="date" name="bd" id="bd" class="input-box" required>
                    </div>

                    <div>
                    
                    <label for="conpassword">Confirm Password:</label>
                    <input type="password" name="conpassword" id="conpassword" class="input-box" required>
                    </div>                   
                </div>
                <div class="email-div">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="input-box" required>
                </div>


                <div class="last">
                    <button type="submit" name="submit">Register</button>
                    <p>Already have an account? <a href="login.php"> Sign in</a></p>
                </div>
            </form>
    </div>

    <?php

    if (!isset($_SESSION)) {
        session_start();
    }

    // Check if the form was submitted
    if (isset($_POST['submit'])) {

        // Get the form input values
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $bd = $_POST['bd'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];

        if ($password !== $conpassword) {
            echo "<script> document.getElementById('message').textContent = 'Passwords Dont Match! '</script>";
        } else {
            $sql = "INSERT INTO patients (F_name, L_Name, Gender, Birthdate, Email,Password)
              VALUES ('$firstname', '$lastname', '$gender', '$bd', '$email', '$password')";

            $_SESSION['name'] = $email;

            if (mysqli_query($con, $sql)) {
                echo '<script> alert("Registration successful!");</script>';
                echo "<script>window.location.href = 'login.php'; </script>";
            } else {
                echo "<script> document.getElementById('message').textContent = 'E-mail Already Taken' </script>";
            }

            mysqli_close($con);
        }
    }
    ?>

</body>

</html>

