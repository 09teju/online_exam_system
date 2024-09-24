<!-- process_add_student.php -->
<?php
// Include config file
require_once 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO students (name, age, educational_qualification, userid, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $age, $educational_qualification, $userid, $password);

    // Set parameters and execute
    $name = $_POST['name'];
    $age = $_POST['age'];
    $educational_qualification = $_POST['educational_qualification'];
    $userid = $_POST['userid'];
    $password = $_POST['password']; // Storing plaintext password (not recommended)

    if ($stmt->execute()) {
        // Redirect back to add_student.php with a success message
        header("Location: add_student.php?status=success");
        exit();
    } else {
        // Redirect back to add_student.php with an error message
        header("Location: add_student.php?status=error");
        exit();
    }

    // Close statement
    //$stmt->close();
}

// Close connection
$conn->close();
?>
