<?php
session_start();
include 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Fetch results from the database
$sql = "SELECT 
            students.name AS student_name, 
            results.subject_name, 
            results.exam_correct AS exam_test_correct,
            results.exam_wrong AS exam_test_wrong
        FROM results
        JOIN students ON results.student_id = students.id";

$result = $conn->query($sql);

// Check for query errors
if ($result === false) {
    echo "Error: " . $conn->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Exam Results</title>
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
        .nested-header th {
            border-bottom: none;
            background-color: #f9f9f9;
        }
        .nested-header th[colspan="2"] {
            text-align: center;
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
   
   

    <section id="main">
        <div class="container">
            <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">Student Name</th>
                        <th rowspan="2">Subject Name</th>
                        <th colspan="2">Exam</th>
                    </tr>
                    <tr class="nested-header">
                        <th>Correct</th>
                        <th>Wrong</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['subject_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['exam_test_correct']); ?></td>
                        <td><?php echo htmlspecialchars($row['exam_test_wrong']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>No results found.</p>
            <?php endif; ?>
        </div>
    </section>

 
</body>
</html>

<?php
// Close connection
$conn->close();
?>
