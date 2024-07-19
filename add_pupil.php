<!DOCTYPE html>
<html>
<head>
    <title>Add Pupil</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Add Pupil</h1>
    <form action="add_pupil.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="medical_info">Medical Info:</label>
        <input type="text" id="medical_info" name="medical_info"><br>
        <label for="class_id">Class ID:</label>
        <input type="number" id="class_id" name="class_id"><br>
        <input type="submit" value="Add Pupil">
    </form>
    <a href="home.html">Back to Home</a>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'connection.php';
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $medical_info = $_POST['medical_info'];
            $class_id = $_POST['class_id'];
            $sql = "INSERT INTO Pupils (first_name, last_name, address, medical_info, class_id) VALUES ('$first_name', '$last_name', '$address', '$medical_info', $class_id)";
            if (mysqli_query($conn, $sql)) {
                echo "Pupil added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
