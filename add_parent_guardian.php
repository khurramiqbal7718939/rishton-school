<!DOCTYPE html>
<html>
<head>
    <title>Add Parent/Guardian</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Add Parent/Guardian</h1>
    <form action="add_parent_guardian.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>
        <input type="submit" value="Add Parent/Guardian">
    </form>
    <a href="home.html">Back to Home</a>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'connection.php';
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $sql = "INSERT INTO Parents_Guardians (first_name, last_name, address, email, phone) VALUES ('$first_name', '$last_name', '$address', '$email', '$phone')";
            if (mysqli_query($conn, $sql)) {
                echo "Parent/Guardian added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
