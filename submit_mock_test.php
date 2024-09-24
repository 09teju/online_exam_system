<?php
session_start();
include 'config.php';

$student_id = $_SESSION['student_id'] ?? null;
$subject_name = $_POST['subject_name'] ?? null;

//if (!$student_id || !$subject_name) {
    //die("Student ID or Subject Name not provided.");
//}

// Prepare an insert statement
$sql = "INSERT INTO test_results (subject_name, student_id, question, optionA, optionB, optionC, optionD, correct_answer, student_answer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

// Loop through each answer
foreach ($_POST as $key => $value) {
    if (strpos($key, 'answer_') === 0) {
        $question_id = str_replace('answer_', '', $key);

        // Fetch the question details
        $stmt_question = $conn->prepare("SELECT question, optionA, optionB, optionC, optionD, answer_key FROM mock_test_questions WHERE id = ?");
        $stmt_question->bind_param("i", $question_id);
        $stmt_question->execute();
        $stmt_question->bind_result($question, $optionA, $optionB, $optionC, $optionD, $correct_answer);
        $stmt_question->fetch();
        $stmt_question->close();

        // Bind parameters and execute the statement
        $stmt->bind_param("sssssssss", $subject_name, $student_id, $question, $optionA, $optionB, $optionC, $optionD, $correct_answer, $value);
        if (!$stmt->execute()) {
            echo "SQL Error: " . $stmt->error;
        }
    }
}

$stmt->close();
header("Location: display_results.php?subject_name=" . urlencode($subject_name) . "&student_id=" . urlencode($student_id));
exit();
?>
