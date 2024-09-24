<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject_name = $_POST['subject_name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["tutorial_pdf"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["tutorial_pdf"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($pdfFileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["tutorial_pdf"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO courses (subject_name, tutorial_pdf) VALUES ('$subject_name', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "New course added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<a href="admin_home.php">
    <button>HOME</button>
    </a>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Add Course</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="admin_home.php">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="main">
        <div class="container">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="card">
                    <h3>Add New Course</h3>
                    <label for="subject_name">Subject Name</label>
                    <input type="text" name="subject_name" required>
                    <label for="tutorial_pdf">Upload Tutorial PDF</label>
                    <input type="file" name="tutorial_pdf" required>
                    <button type="submit" class="button_1">Add Course</button>
                </div>
            </form>
        </div>
    </section>

    
</body>
</html>
