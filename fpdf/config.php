<?php
// Database configuration
$host = 'localhost'; // Replace with your database host
$dbname = 'online_examination'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$port = 4306; // Replace with your MySQL port number if different

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to UTF-8 (optional)
$conn->set_charset("utf8");

?>
