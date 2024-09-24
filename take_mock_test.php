<?php
session_start();

// Check if student is logged in
//if (!isset($_SESSION['student_id'])) {
//    header("Location: student_login.php");
//    exit();
//}

include 'config.php';

// Fetch distinct subject names from mock test questions
$sql = "SELECT DISTINCT subject_name FROM mock_test_questions";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mock Tests</title>
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
        .mock-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
        }
       
        /*new*/
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
  <a class="active" href="student_home.php">HOME</a>
  
  <div class="topnav-right">
    <a href="profile.php">Profile</a>
    <a href="student_courses.php">Courses</a>
    <a href="take_mock_test.php">Mock Test</a>
    <a href="student_exams.php">Take Exam</a>
    <a href="student_results.php">Result</a>
    <a href="student_logout.php">Logout</a>
  </div>
</div>

<section id="main">
    <div class="container">
        
        
        <table class="mock-table">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Mock Test</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
                        echo "<td><a href='take_test.php?subject_name=" . urlencode($row['subject_name']) . "' class='mock-btn'>Take Test</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No mock tests available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>



</body>
</html>

<?php
// Close connection
$conn->close();
?>
