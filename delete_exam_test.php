<?php
// Include config file if not already included
require_once 'config.php';

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}

// Check if delete button is pressed
if (isset($_POST['delete'])) {
    // Ensure selected_subjects array exists and is not empty
    if (!empty($_POST['selected_subjects'])) {
        // Sanitize the input array
        $selected_subjects = array_map('intval', $_POST['selected_subjects']);

        // Prepare the delete statement using a prepared statement
        $placeholders = implode(',', array_fill(0, count($selected_subjects), '?'));
        $sql = "DELETE FROM exam_test_questions WHERE id IN ($placeholders)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $types = str_repeat('i', count($selected_subjects));
            $stmt->bind_param($types, ...$selected_subjects);

            // Execute the delete statement
            if ($stmt->execute()) {
                echo "<script>alert('Selected questions deleted successfully!'); window.location.href='exam.php';</script>";
            } else {
                echo "Error executing delete statement: " . $stmt->error;
            }
        } else {
            echo "Error preparing delete statement: " . $conn->error;
        }

        // Close prepared statement
        $stmt->close();

    } else {
        echo "<script>alert('No questions selected for deletion.'); window.location.href='exam.php';</script>";
    }
}

// Close connection
$conn->close();
?>
