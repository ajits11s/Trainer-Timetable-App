<?php
$conn = new mysqli("localhost", "root", "", "trainer");
$id = $_POST['id'];
$conn->query("DELETE FROM member WHERE id = $id");
?>
