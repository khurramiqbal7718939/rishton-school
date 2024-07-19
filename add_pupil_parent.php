<!DOCTYPE html>
<html>
<head>
    <title>Link Pupil to Parent/Guardian</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Link Pupil to Parent/Guardian</h1>
    <form action="add_pupil_parent.php" method="post">
        <label for="pupil_id">Pupil ID:</label>
        <input type="number" id="pupil_id" name="pupil_id" required><br>
        <label for="parent_id">Parent/Guardian ID:</label>
        <input type="number" id="parent_id" name="parent_id" required><br>
        <input type="submit" value="Link Pupil to Parent/Guardian">
    </form>
    <a href="home.html">Back to Home</a>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'connection.php';
            $pupil_id = $_POST['pupil_id'];
            $parent_id = $_POST['parent_id'];
            $sql = "INSERT INTO Pupil_Parent (pupil_id, parent_id) VALUES ($pupil_id, $parent_id)";
            if (mysqli_query($conn, $sql)) {
                echo "Pupil linked to Parent/Guardian successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
