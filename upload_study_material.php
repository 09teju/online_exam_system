<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'online_examination';
$username = 'root';
$password = '';
$port = 4306; // Default MySQL port

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to add subjects
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $subject_name = $_POST['subject_name'];
    $tutorials = $_FILES['tutorials']['name'];

    // Prepare statement for adding subjects
    $stmt = $conn->prepare("INSERT INTO subjects (subject_name, tutorials) VALUES (?, ?)");
    $stmt->bind_param("ss", $subject_name, $tutorials);

    // Upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["tutorials"]["name"]);

    if (move_uploaded_file($_FILES["tutorials"]["tmp_name"], $target_file)) {
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Subject added successfully!');</script>";
            // Redirect back to courses.php
            echo "<script>window.location = 'courses.php';</script>";
        } else {
            echo "Error adding subject: " . $stmt->error;
        }
    } else {
        echo "Error uploading file.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
