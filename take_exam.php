<?php
session_start();

// Check if student is logged in
//if (!isset($_SESSION['student'])) {
//    header("Location: login.php");
//    exit();
//}

include 'config.php';

$subject = $_GET['subject'];
$sql = "SELECT * FROM exams WHERE subject_name = '$subject'";
$questions = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correct = 0;
    $wrong = 0;
    while ($question = $questions->fetch_assoc()) {
        $id = $question['id'];
        $answer = $_POST["answer_$id"];
        if ($answer == $question['answer_key']) {
            $correct++;
        } else {
            $wrong++;
        }
    }
    $student_id = $_SESSION['student_id'];
    $sql = "INSERT INTO results (student_id, subject_name, exam_correct, exam_wrong) VALUES ('$student_id', '$subject', '$correct', '$wrong') ON DUPLICATE KEY UPDATE exam_correct = '$correct', exam_wrong = '$wrong'";
    $conn->query($sql);
    
    // Redirect to exam done page
    header("Location: exam_done.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam - <?php echo $subject; ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Exam - <?php echo $subject; ?></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="main">
        <div class="container">
            <form method="post" action="">
                <?php while ($question = $questions->fetch_assoc()): ?>
                <div class="card">
                    <h3><?php echo $question['question']; ?></h3>
                    <label>
                        <input type="radio" name="answer_<?php echo $question['id']; ?>" value="A">
                        <?php echo $question['option_a']; ?>
                    </label>
                    <label>
                        <input type="radio" name="answer_<?php echo $question['id']; ?>" value="B">
                        <?php echo $question['option_b']; ?>
                    </label>
                    <label>
                        <input type="radio" name="answer_<?php echo $question['id']; ?>" value="C">
                        <?php echo $question['option_c']; ?>
                    </label>
                    <label>
                        <input type="radio" name="answer_<?php echo $question['id']; ?>" value="D">
                        <?php echo $question['option_d']; ?>
                    </label>
                </div>
                <?php endwhile; ?>
                <button type="submit" class="button_1">Finish</button>
            </form>
        </div>
    </section>

    <footer>
        <p>Online Exam System &copy; 2024</p>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>
