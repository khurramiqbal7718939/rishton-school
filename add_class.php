<!DOCTYPE html>
<html>
<head>
    <title>Add Class</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Add Class</h1>
    <form action="add_class.php" method="post">
        <label for="class_name">Class Name:</label>
        <input type="text" id="class_name" name="class_name" required><br>
        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" required><br>
        <input type="submit" value="Add Class">
    </form>
    <a href="home.html">Back to Home</a>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'connection.php';
            $class_name = $_POST['class_name'];
            $capacity = $_POST['capacity'];
            $sql = "INSERT INTO Classes (class_name, capacity) VALUES ('$class_name', $capacity)";
            if (mysqli_query($conn, $sql)) {
                echo "Class added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
