<?php
// Include config file if not already included
require_once 'config.php';

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}

// Fetch and display exam test questions from database
$sql = "SELECT * FROM exam_test_questions";
$result = $conn->query($sql);

// Fetch all subjects for the dropdown in the form
$sql_subjects = "SELECT subject_name FROM subjects";
$result_subjects = $conn->query($sql_subjects);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Test Questions</title>
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
        .add-form {
            margin-bottom: 20px;
        }
        .delete-btn {
            margin-top: 10px;
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
   



<!-- Add Exam Test Question Button -->
<div>
    <a href="add_exam_test.php">
    <button style="background-color: #D6EEEE; color: black;">
      Add Exam Test Question
    </button>
    </a>
</div>

<!-- Display table of exam test questions -->
<form action="delete_exam_test.php" method="post" class="delete-btn">
<table border="1">
    <thead>
        <tr>
            <th>Select</th>
            <th>Subject Name</th>
            <th>Question</th>
            <th>Option A</th>
            <th>Option B</th>
            <th>Option C</th>
            <th>Option D</th>
            <th>Answer Key</th>
            <th>TimeOut</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='selected_subjects[]' value='" . $row['id'] . "'></td>";
                echo "<td>" . sanitize($row['subject_name']) . "</td>";
                echo "<td>" . sanitize($row['question']) . "</td>";
                echo "<td>" . sanitize($row['optionA']) . "</td>";
                echo "<td>" . sanitize($row['optionB']) . "</td>";
                echo "<td>" . sanitize($row['optionC']) . "</td>";
                echo "<td>" . sanitize($row['optionD']) . "</td>";
                echo "<td>" . sanitize($row['answer_key']) . "</td>";
                echo "<td>" . sanitize($row['timeout']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No exam test questions found.</td></tr>";
        }
        ?>
    </tbody>
</table>

<!-- Delete button to delete selected exam test questions -->
    <button type="submit" name="delete" style="background-color: #D6EEEE; color: black;">Delete Selected</button>
</form>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
