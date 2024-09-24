<?php
session_start();

// Ensure the student is logged in
if (!isset($_SESSION['id'])) {
    header("Location: student_login.php");
    exit();
}

include 'config.php';

$subject = $_GET['subject'];

// Fetch questions and timeout for the subject
$sql = "SELECT * FROM exam_test_questions WHERE subject_name = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $subject);
    $stmt->execute();
    $questions = $stmt->get_result();
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$sql_timeout = "SELECT timeout FROM exam_test_questions WHERE subject_name = ? LIMIT 1";
if ($stmt_timeout = $conn->prepare($sql_timeout)) {
    $stmt_timeout->bind_param("s", $subject);
    $stmt_timeout->execute();
    $timeout_result = $stmt_timeout->get_result();
    $timeout_row = $timeout_result->fetch_assoc();
    $timeout = $timeout_row['timeout'];
    $stmt_timeout->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam - <?php echo htmlspecialchars($subject); ?></title>
    <style>
     body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 80%;
        margin: 20px auto;
    }

    header {
        background-color: #4CAF50;
        color: white;
        padding: 10px 0;
        text-align: center;
    }

    h1 {
        margin: 0;
    }

    .question {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
    }

    .question p {
        margin: 0;
        font-weight: bold;
    }

    .options {
        margin-top: 10px;
    }

    .option {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .option input[type="radio"] {
        margin-right: 10px;
    }

    .option label {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .timer {
        font-size: 20px;
        font-weight: bold;
        float: right;
    }

    .submit-btn {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 20px;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    .notification {
        margin-top: 20px;
        background-color: #4CAF50;
        color: white;
        padding: 15px;
        border-radius: 5px;
        display: none; /* Initially hidden, you can show it using JavaScript when needed */
    }

    .results-table {
        width: 100%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    .results-table th, .results-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .results-table th {
        background-color: #f2f2f2;
    }

    .correct-answer {
        background-color: #c8e6c9;
    }

    .wrong-answer {
        background-color: #ffcdd2;
    }

    </style>
</head>
<body>

<header>
    <div class="container">
        <h1>Exam - <?php echo htmlspecialchars($subject); ?></h1>
        <div class="timer" id="timer">Time Left: <?php echo htmlspecialchars($timeout); ?></div>
    </div>
</header>

<section id="main">
    <div class="container">
        <form id="examForm" method="post" action="submit_exam.php">
            <input type="hidden" name="subject" value="<?php echo htmlspecialchars($subject); ?>">
            <?php
            if ($questions && $questions->num_rows > 0) {
                $question_number = 1; // Initialize question number
                while ($question = $questions->fetch_assoc()) {
                    ?>
                    <div class="question">
                        <p><strong>Question <?php echo $question_number++; ?>:</strong> <?php echo htmlspecialchars($question['question']); ?></p>
                        <div class="options">
                            <label class="option">
                                <input type="radio" name="answer_<?php echo $question['id']; ?>" value="A"> <?php echo htmlspecialchars($question['optionA']); ?>
                            </label>
                            <label class="option">
                                <input type="radio" name="answer_<?php echo $question['id']; ?>" value="B"> <?php echo htmlspecialchars($question['optionB']); ?>
                            </label>
                            <label class="option">
                                <input type="radio" name="answer_<?php echo $question['id']; ?>" value="C"> <?php echo htmlspecialchars($question['optionC']); ?>
                            </label>
                            <label class="option">
                                <input type="radio" name="answer_<?php echo $question['id']; ?>" value="D"> <?php echo htmlspecialchars($question['optionD']); ?>
                            </label>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No questions available for this exam.</p>";
            }
            ?>
            <button type="submit" class="submit-btn">Finish</button>
        </form>
    </div>
</section>



<script>
    // Timer logic
    let timeout = '<?php echo htmlspecialchars($timeout); ?>'.split(':');
    let hours = parseInt(timeout[0]);
    let minutes = parseInt(timeout[1]);
    let seconds = parseInt(timeout[2]);

    function updateTimer() {
        if (seconds === 0) {
            if (minutes === 0) {
                if (hours === 0) {
                    document.getElementById("examForm").submit();
                } else {
                    hours--;
                    minutes = 59;
                    seconds = 59;
                }
            } else {
                minutes--;
                seconds = 59;
            }
        } else {
            seconds--;
        }

        let timerText = `Time Left: ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        document.getElementById("timer").innerText = timerText;
    }

    setInterval(updateTimer, 1000);
</script>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
