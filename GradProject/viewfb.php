


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Feedback</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="viewfb.css">
	<link rel="stylesheet" type="text/css" href="./Header-Footer/headerfooter.css">

</head>

<body>
	<?php include ('header.php')?>
	<div class="container">
		<div class="cards-container">
			<div class="card">
				<div class="subject">review about therapist</div>
				<div class="message">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus aut in rem atque! Vitae incidunt laudantium dolores labore repellendus consequuntur corporis ullam, possimus aliquam eaque quae quis atque ex ab.</div>
				<div class="name">Youssef Mamdouh</div>
				<div class="email">yossefrwy@gmail.com</div>
			</div>
		
			<?php
			// Connect to the database
			include('connection.php');

			// Retrieve the feedback data
			$sql = "SELECT * FROM feedback";
			$result = mysqli_query($con, $sql);

			// Output the data in HTML format
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<div class='card'>";
				echo "<div class='subject'>" . $row['subject'] . "</div>";
				echo "<div class='message'> " . $row['message'] . "</div>";
				echo "<div class='name'> " . $row['name'] . "</div>";
				echo "<div class='email'>" . $row['email'] . "</div>";
				echo "</div>";
			}

			mysqli_close($con);
			?>
		</div>
	</div>
	<?php include './Header-Footer/footer.php'?>

	<script>
		$(function() {
			$(".cards-container").sortable({
				handle: ".card",
				placeholder: "card-placeholder",
			});
		});
	</script>
</body>

</html>






<!-- <!DOCTYPE html>
<html>

<head>
	<title>View Feedback</title>
	<link rel="stylesheet" type="text/css" href="viewfb.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Header-Footer/headerfooter.css">
</head>

<body>
	<div class="container">
		<h1>Feedback</h1>
		<div class="cards-container">
			<?php
			// Connect to the database

			// Retrieve the feedback data
			$sql = "SELECT * FROM feedback";
			$result = mysqli_query($con, $sql);

			// Output the data in HTML format
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<div class='card'>";
				echo "<h2>" . $row['name'] . "</h2>";
				echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
				echo "<p><strong>Subject:</strong> " . $row['subject'] . "</p>";
				echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
				echo "</div>";
			}

			mysqli_close($con);
			?>
		</div>
	</div>
    <?php include ('./Header-Footer/footer.php')?>

	<script>
		$(function() {
			$(".cards-container").sortable({
				handle: ".card",
				placeholder: "card-placeholder",
			});
		});
	</script>
</body>

</html> -->