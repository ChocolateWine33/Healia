<!DOCTYPE html>
<html>

<head>
    <title>Join as Therapist</title>
</head>

<body>
    <h1>Join as Therapist</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="male" id="male" required>Male
        <input type="radio" name="gender" value="female" id="female" required>Female<br><br>
        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" required><br>
        <label for="qualification">Qualification:</label>
        <input type="text" name="qualification" required><br>
        <label for="specialization">Specialization:</label>
        <input type="text" name="specialization" required><br>
        <label for="experience_years">Experience in years:</label>
        <input type="number" name="experience_years" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="phone">Phone Number:</label>
        <input type="text" name="phone_number" required><br>
        <label for="hour_rate">Hourly Rate:</label>
        <input type="number" name="hour_rate" step="0.01" required><br>
        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" required><br>
        <label for="cv">CV:</label>
        <input type="file" name="cv" accept=".pdf" required><br><br>
        <input type="submit" name="apply" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.documentvalue="Join as Therapist">
    </form>
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
        $stmt = $con->prepare("INSERT INTO therapists (Therapist_Name, Gender, Birthdate, qualification, specialization, experience, Email, Password, Therapist_Image, Hour_Rate, cv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssisssds", $name, $gender, $birthdate, $qualification, $specialization, $experience_years, $email, $password, $image, $hour_rate, $cv);
        $stmt->execute();

        // Get the ID of the newly inserted row
        $Therapist_Id = mysqli_insert_id($con);
        $phone_number = $_POST['phone_number'];

        // Prepare and execute the SQL statement to insert the phone number into the phone_numbers table
        $stmt = $con->prepare("INSERT INTO phonenumber (Therapist_Id, Phone) VALUES (?, ?)");
        $stmt->bind_param("is", $Therapist_Id, $phone_number);
        $stmt->execute();

        echo "Therapist added successfully!";

        $stmt->close();
        $con->close();
    }
}
?>