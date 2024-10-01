<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <link rel="stylesheet" href="css/styles.css">
    <script>
        function confirmDelete(studentId) {
            const confirmation = confirm("Are you sure you want to delete this student?");
            if (confirmation) {
                window.location.href = 'delete.php?id=' + studentId;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Student List</h1>
        <a href="create.php">Add New Student</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php
            include 'config.php';
            $result = mysqli_query($conn, "SELECT * FROM students");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Edit</a>
                            <a href='javascript:void(0);' onclick='confirmDelete({$row['id']});'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
