
<?php 
include ('config/logform.php'); 
// include ('includes/sidebar.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
<h2>Healia Log in</h2>
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
