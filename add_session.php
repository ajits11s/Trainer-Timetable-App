<?php
$conn = new mysqli("localhost", "root", "", "trainer");

$trainer_id = $_POST['trainer_id'];
$course = $_POST['course'];
$date = $_POST['session_date'];
$time = $_POST['session_time'];
$location = $_POST['location'];

$conn->query("INSERT INTO trainer_utilization (trainer_id, course, date, time, location)
              VALUES ('$trainer_id', '$course', '$date', '$time', '$location')");

header("Location: admin_dashboard.php");
exit();
?>
