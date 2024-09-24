<?php
// Include config file
require_once 'config.php';

// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, password FROM students WHERE userid = ?");
    $stmt->bind_param("s", $userid);

    // Set parameters and execute
    $userid = $_POST['userid'];
    $stmt->execute();
    $stmt->store_result();

    // Check if userid exists
    if ($stmt->num_rows == 1) {
        // Bind result variables
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        // Verify password
        if ($_POST['password']=== $password) {
            // Password correct, store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["userid"] = $userid;
            $_SESSION["student_id"] = $id; // Store student ID in session

            // Redirect to student dashboard
            header("Location: student_home.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that userid.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
