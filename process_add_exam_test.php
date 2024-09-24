<?php
// Include config file if not already included
require_once 'config.php';

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_name = sanitize($_POST['subject_name']);
    $questions = $_POST['questions'];
    $timeout = sanitize($_POST['timeout']);

    // Prepare an insert statement for multiple questions
    $sql = "INSERT INTO exam_test_questions (subject_name, question, optionA, optionB, optionC, optionD, answer_key, timeout) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        foreach ($questions as $question) {
            $question_text = sanitize($question['question']);
            $optionA = sanitize($question['optionA']);
            $optionB = sanitize($question['optionB']);
            $optionC = sanitize($question['optionC']);
            $optionD = sanitize($question['optionD']);
            $answer_key = sanitize($question['answer_key']);

            $stmt->bind_param("ssssssss", $subject_name, $question_text, $optionA, $optionB, $optionC, $optionD, $answer_key, $timeout);

            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error;
            }
        }
        $stmt->close();
        // Redirect back to exam.php
        header("Location: exam.php");
        exit();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
