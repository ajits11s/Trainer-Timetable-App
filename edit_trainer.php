<?php
$conn = new mysqli("localhost", "root", "", "trainer");

$id = $_POST['id'];
$name = $_POST['full_name'];
$phone = $_POST['phone_number'];
$Language = $_POST['Language'];
$certs = $_POST['certifications'];
$avail = $_POST['availability'];

$conn->query("UPDATE member SET 
  full_name = '$name', 
  phone_number = '$phone', 
  Language = '$Language', 
  certifications = '$certs', 
  availability = '$avail' 
WHERE id = $id");
?>
