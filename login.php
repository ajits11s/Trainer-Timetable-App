<?php
session_start();

// Connect to the database
$conn = new mysqli("localhost", "root", "", "trainer");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get login form data
$email = $_POST['email'];
$password = $_POST['password'];

// Query the member table
$sql = "SELECT * FROM member WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Store session data
    $_SESSION['trainer_id'] = $user['id'];
    $_SESSION['role'] = $user['role']; // Make sure you have a 'role' column in your member table
    $_SESSION['name'] = $user['full_name'];

    // Redirect based on role
    if ($user['role'] === 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: calendar.php");
    }
    exit();
} else {
    echo "Invalid login credentials.";
}
?>
