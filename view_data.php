<!DOCTYPE html>
<html>
<head>
    <title>View Data - Rishton Academy</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        .tab button {
            background-color: #f1f1f1;
            border: none;
            outline: none;
            padding: 14px 16px;
            cursor: pointer;
            font-size: 17px;
        }

        .tab button.active {
            background-color: #ccc;
        }

        .tabcontent {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>
<body>
    <h1>View Data - Rishton Academy</h1>
    <a href="home.html">Back to Home</a>

    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Classes')">Classes</button>
        <button class="tablinks" onclick="openTab(event, 'Teachers')">Teachers</button>
        <button class="tablinks" onclick="openTab(event, 'Pupils')">Pupils</button>
        <button class="tablinks" onclick="openTab(event, 'Parents')">Parents/Guardians</button>
        <button class="tablinks" onclick="openTab(event, 'PupilParent')">Pupil-Parent Links</button>
    </div>

    <div id="Classes" class="tabcontent">
        <h2>Classes</h2>
        <?php
            include 'connection.php';

            $sql = "SELECT * FROM Classes";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Class ID</th>
                            <th>Class Name</th>
                            <th>Capacity</th>
                        </tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['class_id'] . "</td>
                            <td>" . $row['class_name'] . "</td>
                            <td>" . $row['capacity'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No classes found.";
            }

            mysqli_close($conn);
        ?>
    </div>

    <div id="Teachers" class="tabcontent">
        <h2>Teachers</h2>
        <?php
            include 'connection.php';

            $sql = "SELECT * FROM Teachers";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Teacher ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Annual Salary</th>
                            <th>Background Check</th>
                            <th>Class ID</th>
                        </tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['teacher_id'] . "</td>
                            <td>" . $row['first_name'] . "</td>
                            <td>" . $row['last_name'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['annual_salary'] . "</td>
                            <td>" . ($row['background_check'] ? 'Yes' : 'No') . "</td>
                            <td>" . $row['class_id'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No teachers found.";
            }

            mysqli_close($conn);
        ?>
    </div>

    <div id="Pupils" class="tabcontent">
        <h2>Pupils</h2>
        <?php
            include 'connection.php';

            $sql = "SELECT * FROM Pupils";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Pupil ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Medical Info</th>
                            <th>Class ID</th>
                        </tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['pupil_id'] . "</td>
                            <td>" . $row['first_name'] . "</td>
                            <td>" . $row['last_name'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['medical_info'] . "</td>
                            <td>" . $row['class_id'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No pupils found.";
            }

            mysqli_close($conn);
        ?>
    </div>

    <div id="Parents" class="tabcontent">
        <h2>Parents/Guardians</h2>
        <?php
            include 'connection.php';

            $sql = "SELECT * FROM Parents_Guardians";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Parent ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['parent_id'] . "</td>
                            <td>" . $row['first_name'] . "</td>
                            <td>" . $row['last_name'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['phone'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No parents/guardians found.";
            }

            mysqli_close($conn);
        ?>
    </div>

    <div id="PupilParent" class="tabcontent">
        <h2>Pupil-Parent Links</h2>
        <?php
            include 'connection.php';

            $sql = "SELECT * FROM Pupil_Parent";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Pupil ID</th>
                            <th>Parent ID</th>
                        </tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['pupil_id'] . "</td>
                            <td>" . $row['parent_id'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No pupil-parent links found.";
            }

            mysqli_close($conn);
        ?>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Set default tab
        document.getElementsByClassName("tablinks")[0].click();
    </script>
</body>
</html>
