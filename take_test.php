<?php
session_start();
include 'config.php';

$mock_test = null;
$result_questions = null;
$subject_name = null;

if (isset($_GET['subject_name'])) {
    $subject_name = $_GET['subject_name'];
} else {
    echo "Subject name not provided.";
    exit();
}

$sql_questions = "SELECT * FROM mock_test_questions WHERE subject_name = ? ORDER BY id";
if ($stmt_questions = $conn->prepare($sql_questions)) {
    $stmt_questions->bind_param("s", $subject_name);
    $stmt_questions->execute();
    $result_questions = $stmt_questions->get_result();
    $stmt_questions->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Mock Test - <?php echo htmlspecialchars($subject_name); ?></title>
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

    .answer-key {
        margin-top: 10px;
        font-style: italic;
        color: #333;
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
        <h1>Take Mock Test - <?php echo htmlspecialchars($subject_name); ?></h1>
    </div>
</header>

<section id="main">
    <div class="container">
        <?php
        if ($result_questions && $result_questions->num_rows > 0) {
            ?>
            <form id="mock-test-form" action="submit_mock_test.php" method="POST">
                <input type="hidden" name="subject_name" value="<?php echo htmlspecialchars($subject_name); ?>">
                <?php
                $question_number = 1; // Initialize question number
                while ($row_question = $result_questions->fetch_assoc()) {
                    ?>
                    <div class="question" data-answer="<?php echo $row_question['answer_key']; ?>">
                        <p><strong>Question <?php echo $question_number++; ?>:</strong> <?php echo htmlspecialchars($row_question['question']); ?></p>
                        <div class="options">
                            <label class="option" data-question="<?php echo $row_question['id']; ?>" data-answer="A">
                                A
                                <input type="radio" name="answer_<?php echo $row_question['id']; ?>" value="A"> <?php echo htmlspecialchars($row_question['optionA']); ?>
                            </label>
                            <br>
                            <label class="option" data-question="<?php echo $row_question['id']; ?>" data-answer="B">
                                B
                                <input type="radio" name="answer_<?php echo $row_question['id']; ?>" value="B"> <?php echo htmlspecialchars($row_question['optionB']); ?>
                            </label>
                            <br>
                            <label class="option" data-question="<?php echo $row_question['id']; ?>" data-answer="C">
                                C
                                <input type="radio" name="answer_<?php echo $row_question['id']; ?>" value="C"> <?php echo htmlspecialchars($row_question['optionC']); ?>
                            </label>
                            <br>
                            <label class="option" data-question="<?php echo $row_question['id']; ?>" data-answer="D">
                                D
                                <input type="radio" name="answer_<?php echo $row_question['id']; ?>" value="D"> <?php echo htmlspecialchars($row_question['optionD']); ?>
                            </label>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <button type="submit" class="submit-btn">Finish Test</button>
            </form>
            <?php
        } else {
            echo "<p>No questions available for this mock test.</p>";
        }
        ?>
    </div>
</section>



</body>
</html>
