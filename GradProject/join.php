<?php

include('connection.php');
include('logform.php');

// Retrieve patient data from the database
//  $tid = $_SESSION['tid'] ;

if (isset($_SESSION['name'])) {
    $e = $_SESSION['name'];
    echo "<script>alert('Please log out first')</script>";    
    echo "<script>window.location.href = 'index.php'; </script>";
    exit();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="join.css">
    <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
    <title>Document</title>
</head>
<body>
    <?php include ('header.php')?>
    <form action="#" method="POST" enctype="multipart/form-data">
        <h1>Join as Therapist</h1>

        <div class='information'>
            <label for="name">Name</label>
            <input type="text" name="name" required>
            <label id='gender' for="gender">Gender</label>
            <select id="cars"  name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
            </select>
            <label for="email">Email</label>
            <input type="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" required>

            <label for="cv">CV</label>
            <input type="file" name="cv" accept=".pdf" required>
        </div>


        <div class='qualifications'>
            <label for="phone">Phone Number</label>
            <input type="text" name="phonenumber" required>
            <label for="qualification">Qualification</label>
            <input type="text" name="qualification" required>
            <label for="specialization">Specialization</label>
            <input type="text" name="specialization" required>
            <label for="experience_years">Experience in years</label>
            <input type="number" name="experience_years" required>
            <label for="hour_rate">Hourly Rate</label>
            <input type="number" name="hour_rate" step="0.01" required>
            <label for="image">Image</label>
            <input type="file" name="image" accept="image/*" required>
           
        </div>
        <input type="submit" name="apply" class='submit-btn' accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.documentvalue="Join as Therapist">
    </form>
    <?php include ('./Header-Footer/footer.php')?>
</body>
</html>
<?php
// Connect to the database
include('connection.php');

if (isset($_POST['apply'])) {


    // Get the therapist data from the form
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $qualification = $_POST['qualification'];
    $specialization = $_POST['specialization'];
    $experience_years = $_POST['experience_years'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hour_rate = $_POST['hour_rate'];
    $phonenumber = $_POST['phonenumber'];

    if (isset($_FILES['image']) && isset($_FILES['cv'])) {

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        
        $cv = $_FILES['cv']['name'];
        $cv_tmp = $_FILES['cv']['tmp_name'];

        // Move the image and CV files to a directory on the server
        $image_path = "therapists/" . $image;
        move_uploaded_file($image_tmp, $image_path);
        $cv_path = "therapists/" . $cv;
        move_uploaded_file($cv_tmp, $cv_path);

        // Prepare and execute the SQL statement to insert the therapist data into the database
        $stmt = $con->prepare("INSERT INTO therapists (Therapist_Name, Gender, Birthdate, qualification, specialization, experience, Email, Password, Therapist_Image, Hour_Rate, cv, phonenumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssisssdss", $name, $gender, $birthdate, $qualification, $specialization, $experience_years, $email, $password, $image, $hour_rate, $cv,$phonenumber);
        $stmt->execute();

        echo "<script>alert('Join request sent successfully!')</script>";

        $stmt->close();
     
        $con->close();
    }
   
}
?>