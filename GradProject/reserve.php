<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // Redirect to the login page
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Reservation</title>
</head>
<body>
    <h1>Doctor Reservation</h1>
    <form action="reserve.php" method="post">
        <label for="doctor_id">Therapist:</label>
        <select name="doctor_id" id="doctor_id" required>
            <option value="">Select a Therapist</option>
            <?php
            require 'config.php';
            require 'connection.php';

            $sql = "SELECT DISTINCT Therapist_ID  FROM schedule";
            $result = $con->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"" . $row["doctor_id"] . "\">Doctor " . $row["doctor_id"] . "</option>";
            }

            $con->close();
            ?>
        </select>
        <br>
        <label for="patient_name">Patient Name:</label>
        <input type="text" name="patient_name" id="patient_name" required>
        <br>
        <label for="reservation_date">Date:</label>
        <input type="date" name="reservation_date" id="reservation_date" required>
        <br>
        <label for="reservation_time">Time:</label>
        <input type="time" name="reservation_time" id="reservation_time" required>
        <br>
        <input type="submit" value="Reserve">
    </form>
</body>
</html>

<?php
require 'connection.php';

$doctor_id = $_POST['doctor_id'];
$patient_name = $_POST['patient_name'];
$reservation_date = $_POST['reservation_date'];
$reservation_time = $_POST['reservation_time'];

$sql = "SELECT * FROM schedule WHERE doctor_id = ? AND available_date = ? AND start_time <= ? AND end_time >= ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("isss", $doctor_id, $reservation_date, $reservation_time, $reservation_time);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $sql = "INSERT INTO request (doctor_id, patient_name, reservation_date, reservation_time) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("isss", $doctor_id, $patient_name, $reservation_date, $reservation_time);

    if ($stmt->execute()) {
        echo "Reservation successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    echo "The selected time is not available.";
}

$stmt->close();
$con->close();
?>
