<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if (mysqli_query($conn, $sql)) {
        echo "New student created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link rel="stylesheet" href="css/styles.css">
    <script>
        function validateForm() {
            const name = document.forms["studentForm"]["name"].value;
            const email = document.forms["studentForm"]["email"].value;
            const phone = document.forms["studentForm"]["phone"].value;
            
            if (name == "" || email == "" || phone == "") {
                alert("All fields must be filled out.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Create Student</h2>
        <form name="studentForm" method="post" action="create.php" onsubmit="return validateForm()">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" ><br>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" ><br>
            
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" ><br>
            
            <input type="submit" name="submit" value="Create">
        </form>
    </div>
</body>
</html>
