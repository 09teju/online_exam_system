<?php
session_start();

// Include config file
require_once 'config.php';

// Check if student is logged in
if (!isset($_SESSION['id']) || !isset($_SESSION['userid'])) {
    header("Location: student_login.php");
    exit();
}

$student_id = $_SESSION['id'];

// Fetch student details from database
$sql = "SELECT * FROM students WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Add your CSS styling here -->
    <style>
        form {
            width: 300px;
            margin: 60px auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="number"] {
            width: calc(100% - 16px); /* Adjusted to account for padding */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            outline: none;
            border-color: #66afe9; /* Light blue on focus */
        }

        .profile-heading {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .btn {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        /* new*/
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
   


<form>
    <label for="name">Name:</label>
    <input type="text" id="name" value="<?php echo htmlspecialchars($student['name'] ?? ''); ?>" disabled>

    <label for="age">Age:</label>
    <input type="number" id="age" value="<?php echo htmlspecialchars($student['age'] ?? ''); ?>" disabled>

    <label for="educational_qualification">Educational Qualification:</label>
    <input type="text" id="educational_qualification" value="<?php echo htmlspecialchars($student['educational_qualification'] ?? ''); ?>" disabled>

    <label for="userid">UserID:</label>
    <input type="text" id="userid" value="<?php echo htmlspecialchars($student['userid'] ?? ''); ?>" disabled>

    <label for="password">Password:</label>
    <input type="text" id="password" value="<?php echo htmlspecialchars($student['password'] ?? ''); ?>" disabled>
</form>

</body>
</html>
