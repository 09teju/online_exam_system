<?php
session_start();
// if (!isset($_SESSION['student'])) {
//     header("Location: login.php");
//     exit();
// }

$subject = $_GET['subject'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Rules - <?php echo htmlspecialchars($subject); ?></title>
    <!-- Add your CSS styling here -->
    <style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        /new8/
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
  <a class="active" href="student_exams.php">BACK</a>
  
  <div class="topnav-right">
    <a href="profile.php">Profile</a>
    <a href="student_courses.php">Courses</a>
    <a href="take_mock_test.php">Mock Test</a>
    <a href="student_exams.php">Take Exam</a>
    <a href="student_results.php">Result</a>
    <a href="student_logout.php">Logout</a>
  </div>
</div>
    <header>
        <div class="container">
            <h1>Exam Rules - <?php echo htmlspecialchars($subject); ?></h1>
        </div>
    </header>

    <section id="main">
        <div class="container">
            <p>Please read the following rules and regulations before starting the exam:</p>
            <ul>
                <li>No cheating.</li>
                <li>Keep your webcam on during the exam.</li>
                <li>Do not navigate away from the exam page.</li>
                <li>You have limited time to complete the exam.</li>
                <li>Good luck!</li>
            </ul>
            <p>Motivational Quote: "Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful." - Albert Schweitzer</p>
            <a href="start_exam.php?subject=<?php echo urlencode($subject); ?>" class="button">Start Exam</a>
        </div>
    </section>

</body>
</html>