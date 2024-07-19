<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Add Teacher</h1>
    <form action="add_teacher.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>
        <label for="annual_salary">Annual Salary:</label>
        <input type="number" step="0.01" id="annual_salary" name="annual_salary" required><br>
        <label for="background_check">Background Check:</label>
        <input type="checkbox" id="background_check" name="background_check" value="1"><br>
        <label for="class_id">Class ID:</label>
        <input type="number" id="class_id" name="class_id"><br>
        <input type="submit" value="Add Teacher">
    </form>
    <a href="home.html">Back to Home</a>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'connection.php';
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $annual_salary = $_POST['annual_salary'];
            $background_check = isset($_POST['background_check']) ? 1 : 0;
            $class_id = $_POST['class_id'];
            $sql = "INSERT INTO Teachers (first_name, last_name, address, phone, annual_salary, background_check, class_id) VALUES ('$first_name', '$last_name', '$address', '$phone', $annual_salary, $background_check, $class_id)";
            if (mysqli_query($conn, $sql)) {
                echo "Teacher added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
