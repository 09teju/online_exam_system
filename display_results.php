<?php
include 'config.php';

$subject_name = $_GET['subject_name'] ?? null;
$student_id = $_GET['student_id'] ?? null;

//if (!$subject_name || !$student_id) {
  //  die("Subject Name or Student ID not provided.");
//}

$sql = "SELECT question, optionA, optionB, optionC, optionD, correct_answer, student_answer 
        FROM test_results 
        WHERE subject_name = ? AND student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $subject_name, $student_id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Test Results</title>
    <style>
        .results-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        .results-table th, .results-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .results-table th {
            background-color: #f2f2f2;
        }
        .correct-answer {
            background-color: #c8e6c9;
        }
        .wrong-answer {
            background-color: #ffcdd2;
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
  <a class="active" href="take_mock_test.php">BACK</a>
  
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
        <h1 style="margin-top:10px;">Mock Test Results ( <button style="background-color:#c8e6c9; padding:5px; padding-top:8px;" >Correct</button> <button style="background-color:#ffcdd2; padding:5px; padding-top:8px;" >Wrong</button> )</h1>
    </div>
</header>

<section id="main">
    <div class="container">
        <table class="results-table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['question']); ?></td>
                    <td><?php echo htmlspecialchars($row['optionA']); ?></td>
                    <td><?php echo htmlspecialchars($row['optionB']); ?></td>
                    <td><?php echo htmlspecialchars($row['optionC']); ?></td>
                    <td><?php echo htmlspecialchars($row['optionD']); ?></td>
                    <td><?php echo htmlspecialchars($row['correct_answer']); ?></td>
                    <td class="<?php echo ($row['student_answer'] == $row['correct_answer']) ? 'correct-answer' : 'wrong-answer'; ?>">
                        <?php echo htmlspecialchars($row['student_answer']); ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>



</body>
</html>
