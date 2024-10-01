<?php
include 'config.php';  // Include the database connection

$id = $_GET['id'];  // Get the student ID from the URL

// Delete the student from the database
$sql = "DELETE FROM students WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    echo "Student deleted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Redirect to the homepage
header("Location: index.php");
?>
