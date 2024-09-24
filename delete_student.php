<?php
// Include config file
require_once 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_students'])) {
    // Begin transaction
    $conn->begin_transaction();

    try {
        // Prepare statement for deleting student results
        $stmtDeleteResults = $conn->prepare("DELETE FROM results WHERE student_id = ?");
        // Prepare statement for deleting student record
        $stmtDeleteStudent = $conn->prepare("DELETE FROM students WHERE id = ?");

        // Bind parameter for deleting results
        $stmtDeleteResults->bind_param("i", $id);
        // Bind parameter for deleting student
        $stmtDeleteStudent->bind_param("i", $id);

        // Loop through selected students and delete each one
        foreach ($_POST['selected_students'] as $id) {
            // Delete student's results first
            $stmtDeleteResults->execute();

            // Then delete the student record
            $stmtDeleteStudent->execute();
        }

        // Commit transaction
        $conn->commit();
    } catch (Exception $e) {
        // Rollback transaction if something goes wrong
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Close statements
    $stmtDeleteResults->close();
    $stmtDeleteStudent->close();
}

// Close connection
$conn->close();

// Redirect to students page after deletion
header("Location: students.php");
exit();
?>
