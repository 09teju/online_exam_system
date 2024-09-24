<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: student_login.php");
    exit();
}

include 'config.php';

$student_id = $_SESSION['student_id'];
$subject = $_POST['subject'];

// Fetch the correct answers
$sql = "SELECT id, answer_key FROM exam_test_questions WHERE subject_name = '$subject'";
$result = $conn->query($sql);

$correct_answers = [];
while ($row = $result->fetch_assoc()) {
    $correct_answers[$row['id']] = $row['answer_key'];
}

// Evaluate the student's answers
$correct_count = 0;
$wrong_count = 0;

foreach ($correct_answers as $question_id => $correct_answer) {
    $student_answer = $_POST['answer_' . $question_id];
    if ($student_answer == $correct_answer) {
        $correct_count++;
    } else {
        $wrong_count++;
    }
}

// Store the results in the database
$sql = "INSERT INTO results (student_id, subject_name, exam_correct, exam_wrong) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isii", $student_id, $subject, $correct_count, $wrong_count);
$stmt->execute();

// Redirect to the exam done page
header("Location: exam_done.php");
exit();

// Close connection
$conn->close();
?>
