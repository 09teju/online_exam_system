<!-- add_student.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- Add your CSS styling here -->
    <style>
        /* Example CSS styling */
        form {
            width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .message {
            margin: 0 auto 20px;
            padding: 10px;
            width: 300px;
            text-align: center;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
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
  <a class="active" href="student.php">BACK</a>
  
  <div class="topnav-right">
    <a href="courses.php">Courses</a>
    <a href="mock_test.php">Mock Test</a>
    <a href="exam.php">Exam</a>
    <a href="student.php">Student</a>
    <a href="result.php">Result</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
   



<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<div class="message success">Student added successfully.</div>';
    } elseif ($_GET['status'] == 'error') {
        echo '<div class="message error">Error adding student. Please try again.</div>';
    }
}
?>

<form action="process_add_student.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required>

    <label for="educational_qualification">Educational Qualification:</label>
    <input type="text" id="educational_qualification" name="educational_qualification" required>

    <label for="userid">USERID:</label>
    <input type="text" id="userid" name="userid" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <button type="submit">Add Student</button>
</form>

</body>
</html>
