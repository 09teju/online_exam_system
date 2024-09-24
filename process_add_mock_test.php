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
    $num_questions = (int)$_POST['num_questions'];

    // Prepare an insert statement
    $sql = "INSERT INTO mock_test_questions (subject_name, question, optionA, optionB, optionC, optionD, answer_key) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Initialize statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssssss", $subject_name, $question, $optionA, $optionB, $optionC, $optionD, $answer_key);

    // Loop through each question
    for ($i = 1; $i <= $num_questions; $i++) {
        // Sanitize and retrieve values from $_POST
        $question = sanitize($_POST["question_$i"]);
        $optionA = sanitize($_POST["optionA_$i"]);
        $optionB = sanitize($_POST["optionB_$i"]);
        $optionC = sanitize($_POST["optionC_$i"]);
        $optionD = sanitize($_POST["optionD_$i"]);
        $answer_key = sanitize($_POST["answer_key_$i"]);

        // Execute the statement
        $stmt->execute();
    }

    // Close statement
    $stmt->close();

    // Redirect back to mock_test.php
    header("Location: mock_test.php");
    exit();
} else {
    // If form not submitted, redirect to the form page
    header("Location: add_mock_test.php");
    exit();
}

// Close connection
$conn->close();
?>
