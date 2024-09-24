<?php
// Start the session
session_start();

// Include config file
require_once 'config.php';

// Check if student_id is set in the session
if (!isset($_SESSION['student_id'])) {
    die("Student ID not found in the session. Please log in again.");
}

// Retrieve the student_id from the session
$student_id = $_SESSION['student_id'];

// Fetch results from the database
$sql = "SELECT subject_name, exam_correct FROM results WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Exam Results</title>
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
        <table class="results-table">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Marks</th>
                    <th>Badge</th>
                    <th>Certificate</th> <!-- Added Certificate column -->
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()):
                    $subject_name = $row['subject_name'];
                    $marks = $row['exam_correct'];

                    // Fetch the total number of questions for the subject
                    $sql_questions = "SELECT COUNT(*) as total_questions FROM exam_test_questions WHERE subject_name = ?";
                    $stmt_questions = $conn->prepare($sql_questions);
                    $stmt_questions->bind_param("s", $subject_name);
                    $stmt_questions->execute();
                    $result_questions = $stmt_questions->get_result();
                    $row_questions = $result_questions->fetch_assoc();
                    $total_questions = $row_questions['total_questions'];
                    $stmt_questions->close();

                    $badge = '';

                    // Determine badge based on marks
                    if ($marks == $total_questions) {
                        $badge = '&#x2B50;'; // Gold Star
                    } elseif ($marks >= $total_questions / 2) {
                        $badge = '&#9733;'; // Gray Star
                    } else {
                        $badge = '&#x272F;'; // Black Star
                    }

                    // Determine if the certificate should be available
                    $certificate = '';
                    if ($marks == $total_questions) {
                        $certificate = "<a href='fpdf/download_certificate.php?student_id=".$student_id."&subject_name=".$subject_name."'>Download Certificate</a>";
                    } else {
                        $certificate = "Not Available";
                    }
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($subject_name); ?></td>
                    <td><?php echo htmlspecialchars($marks); ?></td>
                    <td class="badge"><?php echo $badge; ?></td>
                    <td><?php echo $certificate; ?></td> <!-- Certificate column value -->
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

</body>
</html>

<?php
// Close statement and connection
$stmt->close();
$conn->close();
?>
