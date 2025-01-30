<?php
// connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=healia', 'username', 'password');

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // validate the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $time_from = $_POST['timefrom'];
  $time_to = $_POST['timeto'];

  // insert the appointment into the database
  $stmt = $pdo->prepare("INSERT INTO request (name, email, phone, Date, TimeFrom, TimeTo) VALUES (?, ?, ?, ?, ? , ?)");
  $stmt->execute([$name, $email, $phone, $date, $time_from,$time_to]);

  // display a confirmation message
  echo "Session is booked successfully!";

  // send an email to the user
  $to = $email;
  $subject = "Appointment Confirmation";
  $message = "Hi $name,\n\nYour appointment has been booked for $date at $time.";
  $headers = "From: Appointment Booking System <noreply@example.com>";
  mail($to, $subject, $message, $headers);
}
?>
