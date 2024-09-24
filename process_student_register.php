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
    //$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Store the hashed password
    $password = $_POST['password']; // Storing plaintext password (not recommended)


    if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header("Location: student_login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
