<?php
// Include config file if not already included
require_once 'config.php';

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}

// Check if delete button is pressed
if (isset($_POST['delete'])) {
    if (!empty($_POST['selected_subjects'])) {
        $selected_subjects = $_POST['selected_subjects'];

        // Prepare the delete statement
        $ids = implode(',', array_map('intval', $selected_subjects));
        $sql = "DELETE FROM mock_test_questions WHERE id IN ($ids)";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Selected questions deleted successfully!'); window.location.href='mock_test.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "<script>alert('No questions selected for deletion.'); window.location.href='mock_test.php';</script>";
    }
}

// Close connection
$conn->close();
?>
