<?php
$conn = new mysqli("localhost", "root", "", "trainer");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$full_name = $_POST['full_name'];
$phone_number = $_POST['phone_number'];
$language = $_POST['language'];
$certifications = $_POST['certifications'];
$availability = $_POST['availability'];

$sql = "INSERT INTO member (email, password, role, full_name, phone_number, Language, certifications, availability) 
        VALUES ('$email', '$password', '$role', '$full_name', '$phone_number', '$language', '$certifications', '$availability')";

if ($conn->query($sql) === TRUE) {
    echo "Trainer added successfully. <a href='admin_dashboard.php'>Go back to Dashboard</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
