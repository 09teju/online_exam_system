<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
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
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }



        <!-- Add Subject Button -->
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
   


<!-- Add Subject Button -->
<button style="background-color: #D6EEEE;"><a href="add_subject.php" style="color: black;" >+ ADD SUBJECT</a></button><br><br>

<!-- Delete Form -->
<form method="post" action="delete_courses.php">
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>id</th>
                <th>Subject Name</th>
                <th>Tutorials</th>
               
            </tr>
        </thead>
        <tbody>
            
            <?php
            // Database connection parameters
            $host = 'localhost';
            $dbname = 'online_examination';
            $username = 'root';
            $password = '';
            $port = 4306; // Default MySQL port
            
            // Create connection
            $conn = new mysqli($host, $username, $password, $dbname, $port);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Handle form submission to delete subjects
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && !empty($_POST['selected_subjects'])) {
                $selected_subjects = $_POST['selected_subjects'];
                foreach ($selected_subjects as $subject_id) {
                    // Prepare statement for deleting subjects
                    $stmt = $conn->prepare("DELETE FROM subjects WHERE id = ?");
                    $stmt->bind_param("i", $subject_id);
                    if (!$stmt->execute()) {
                        echo "Error deleting subject with ID $subject_id: " . $stmt->error . "<br>";
                    }
                    $stmt->close();
                }
            }
            
            // Prepare SQL statement to fetch courses
            $stmt = $conn->prepare("SELECT id, subject_name, tutorials FROM subjects");
            
            // Check if prepare() succeeded
            if ($stmt === false) {
                die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
            }
            
            // Execute SQL statement
            if (!$stmt->execute()) {
                die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
            }
            
            // Get result set
            $result = $stmt->get_result();
            
            // Check if there are rows returned
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='selected_subjects[]' value='" . $row["id"] . "'></td>";
                    echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["subject_name"]) . "</td>";
                    echo "<td><a href='uploads/" . htmlspecialchars($row["tutorials"]) . "' target='_blank'>View Tutorial</a></td>";
    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No courses found</td></tr>";
            }
            
            // Close statement and connection
            $stmt->close();
            $conn->close();
            ?>
        </tbody>
    </table>
    <button type="submit" name="submit" style="background-color: #D6EEEE; color:black;">Delete Selected Subjects</button>
</form>

</body>
</html>
