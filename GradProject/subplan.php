<?php
include('connection.php');
include('logform.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"   href="style.css">
    <link rel="stylesheet" href="subplan.css">
    <link rel="stylesheet"   href="./Header-Footer/headerfooter.css">
    
    <title>Subscription Plan</title>
</head>

<body>
    <?php include ('header.php')?>

    <div class='join-community'>
    <h3 style="">Join Our Community</h3>
    <button   href=""><a href="payment-n.php" style='color:var(--main-color)'>Subscribe</a></button>
    </div>


     
    <?php
    $sql = "SELECT * FROM events";
    $result = mysqli_query($con, $sql);
    
    if ($result->num_rows > 0) {
        echo '<h4 style="text-align:center; font-weight:100; font-size:2rem">Events</h4>';
        echo '<div class="events">';

        $count = 0;
        while ($row = $result->fetch_assoc()) {
            $eventTime = date('h:i A', strtotime($row['time']));
            $eventDate = date('F j, Y', strtotime($row['Date']));
            // if ($count % 3 == 0 && $count !== 0) {
            //     echo '</div><br><div class="row">';
            // }
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row["Event_Title"] . '</h4>';
            echo '<p class="card-text"><b>Description: </b>' . $row["Description"] . '</p>';
            echo '<p class="card-text"><b>Address: </b>: ' . $row["Address"] . '</p>';
            echo '<p class="card-text"><b>Date:</b> ' . $eventDate . '</p>';
            echo '<p class="card-text"><b>Time:</b> ' . $eventTime  . '</p>'; 
            echo '</div>';
            echo '<button class="card-button"><a  href="bookplan-new.php?eventid='. $row["Event_ID"].'" > Book Event</a></button>';
            echo '</div>';

            $count++;
        }
        echo '</div>';
    } else {
        echo "No events found.";
    }

    ?>

    <?php
    $sql = "SELECT * FROM group_therapy";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        echo '<h4 style="text-align:center; font-weight:100; font-size:2rem">Group Therapy</h4>';
        echo '<div class="events">';

        $count = 0;
        while ($row = $result->fetch_assoc()) {
            $groupTime = date('h:i A', strtotime($row['time']));
            $groupDate = date('F j, Y', strtotime($row['date']));
            // if ($count % 3 == 0 && $count !== 0) {
            //     echo '</div><br><div class="row">';
            // }

            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row["Group_Name"] . '</h4>';
            echo '<p class="card-text"><b>Description:</b> ' . $row["G_Description"] . '</p>';
            echo '<p class="card-text"><b>Address:</b> ' . $row["location"] . '</p>';
            echo '<p class="card-text"><b> Date:</b>' . $groupDate . '</p>';
            echo '<p class="card-text"><b>Time: </b>: ' .  $groupTime. '</p>'; 
            echo '</div>';
            echo '<button class="card-button"><a  href="bookplan-new.php?groupid=' . $row["Group_ID"].'">Book Group Therapy</a></button>';
            echo '</div>';
            $count++;
        }
        echo '</div>';
    } else {
        echo "No group therapy found.";
    }

    ?>

    <?php
    $sql = "SELECT * FROM book_discussion_club";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        echo '<h4 style="text-align:center; font-weight:100; font-size:2rem">Book Discussion Club</h4>';
        echo '<div class="events">';

        $count = 0;
        while ($row = $result->fetch_assoc()) {
            $dTime = date('h:i A', strtotime($row['time']));
            $dDate = date('F j, Y', strtotime($row['date']));
            // if ($count % 3 == 0 && $count !== 0) {
            //     echo '</div><br><div class="row">';
            // }
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<img  src="images/' . $row['Book_image'] . '">';
            echo '<h4 class="card-title">' . $row["Book_Name"] . '</h4>';
            echo '<p class="card-text"><b>Description: </b>' . $row["Description"] . '</p>';
            echo '<p class="card-text"><b>Date: </b>: ' .  $dDate . '</p>';
            echo '<p class="card-text"><b>Time:</b> ' . $dTime . '</p>';
            echo '<p class="card-text"><b>URL Meeting:</b> ' . $row["url"] . '</p>';
            echo '</div>';
            echo '<button  class="card-button"><a  href="bookplan-new.php?bookid='. $row["Book_ID"].'">Book Discussion</a></button>';
            echo '</div>';

            $count++;
        }
        echo '</div>';
    } else {
        echo "No book discussion clubs found.";
    }
    $con->close();
    ?>

<?php include ('./Header-Footer/footer.php')?>


</body>
</html>