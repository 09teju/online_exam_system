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

// Check if form is submitted and selected subjects are sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && !empty($_POST['selected_subjects'])) {
    $selected_subjects = $_POST['selected_subjects'];
    foreach ($selected_subjects as $subject_id) {
        // Prepare statement for deleting subjects
        $stmt = $conn->prepare("DELETE FROM subjects WHERE id = ?");
        if (!$stmt) {
            echo "Error preparing statement for subject ID $subject_id: " . $conn->error . "<br>";
            continue;
        }
        $stmt->bind_param("i", $subject_id);
        if (!$stmt->execute()) {
            echo "Error deleting subject with ID $subject_id: " . $stmt->error . "<br>";
        } else {
            echo "Subject with ID $subject_id deleted successfully.<br>";
        }
        $stmt->close();
    }
} else {
    echo "No subjects selected for deletion.";
}

// Close connection
$conn->close();
?>
