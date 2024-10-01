<?php
include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Student updated successfully!";
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
    <title>Update Student</title>
    <link rel="stylesheet" href="css/styles.css">
    <script>
        // JavaScript function to validate form inputs
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

        function validatePhoneNumber() {
            const phone = document.forms["studentForm"]["phone"].value;
            const phonePattern = /^[0-9]{10}$/;  // Regex pattern for exactly 10 digits

            if (!phonePattern.test(phone)) {
                alert("Please enter a valid 10-digit phone number.");
                document.forms["studentForm"]["phone"].value = null;
                return false;  
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Update Student</h2>
        <form name="studentForm" method="post" action="" onsubmit="return validateForm() && validatePhoneNumber()">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" ><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" ><br>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" ><br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>

</html>
