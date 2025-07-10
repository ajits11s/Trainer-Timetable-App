<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "trainer"; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

if ($password !== $confirm) {
  echo "<script>alert('Passwords do not match'); window.location.href='signup.html';</script>";
  exit();
}

// Check if email already exists
$check = $conn->query("SELECT * FROM member WHERE email='$email'");
if ($check->num_rows > 0) {
  echo "<script>alert('Email already registered'); window.location.href='signup.html';</script>";
  exit();
}

// Insert into member table with role = trainer
$sql = "INSERT INTO member (email, password, role) VALUES ('$email', '$password', 'trainer')";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Registration successful! Please login.'); window.location.href='login.html';</script>";
} else {
  echo "<script>alert('Error during registration.'); window.location.href='signup.html';</script>";
}

$conn->close();
?>
