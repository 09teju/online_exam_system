<?php
// Include config file if not already included
require_once 'config.php';

// Fetch and display students from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <!-- Add your CSS styling here -->
    <style>
        /* Example CSS styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
  background-color: #D6EEEE;
}
        .add-btn, .delete-btn {
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        <!-- new -->
        body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav-right {
  float: right;
}

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}


    </style>
</head>
<body>

<div class="topnav">
  <a class="active" href="admin_home.php">HOME</a>
  
  <div class="topnav-right">
    <a href="courses.php">Courses</a>
    <a href="mock_test.php">Mock Test</a>
    <a href="exam.php">Exam</a>
    <a href="student.php">Student</a>
    <a href="result.php">Result</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
   



<!-- Add Student button -->
<div class="add-btn">
    <button onclick="window.location.href='add_student.php'" style="background-color: #D6EEEE; color: black;">+ ADD STUDENT</button>
</div>

<!-- Display table of students -->
<form action="delete_student.php" method="post">
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Age</th>
                <th>Educational Qualification</th>
                <th>USERID</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='selected_students[]' value='" . $row['id'] . "'></td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['educational_qualification']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['userid']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['password']) . "</td>"; // Displaying plaintext password
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No students found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="submit" name="delete" class="delete-btn" style="background-color: #D6EEEE; color: black;">Delete Selected</button>
</form>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
