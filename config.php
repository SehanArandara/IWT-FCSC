<?php
$conn = mysqli_connect("localhost", "root", "", "st_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
