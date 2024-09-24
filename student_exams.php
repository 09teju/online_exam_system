<?php
session_start();
// if (!isset($_SESSION['student'])) {
//     header("Location: login.php");
//     exit();
// }

include 'config.php';

// Fetch all subjects from the exam table
$sql = "SELECT DISTINCT subject_name FROM exam_test_questions";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Exams</title>
    <!-- Add your CSS styling here -->
    <style>
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
        
        btn {
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
        tr:nth-child(even) {
  background-color: #D6EEEE;
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
            <table border="1">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Take Exam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
                            echo "<td><a href='exam_rules.php?subject=" . urlencode($row['subject_name']) . "' class='button'>Take Exam</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No exams available.</td></tr>";
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
