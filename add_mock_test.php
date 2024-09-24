<?php
// Include config file if not already included
require_once 'config.php';

// Fetch all subjects for the dropdown in the form
$sql_subjects = "SELECT subject_name FROM subjects";
$result_subjects = $conn->query($sql_subjects);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Mock Test Question</title>
    <!-- Add your CSS styling here -->
    <style>
        /* Example CSS styling */
        form {
            width: 100%;
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin: 8px 0 4px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .question-group {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        /* neww*/
        body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav-right {
  float: right;
}

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/*form style*/
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
    </style>
</head>
<body>
<div class="topnav">
  <a class="active" href="mock_test.php">BACK</a>
  
  <div class="topnav-right">
    <a href="courses.php">Courses</a>
    <a href="mock_test.php">Mock Test</a>
    <a href="exam.php">Exam</a>
    <a href="student.php">Student</a>
    <a href="result.php">Result</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
   


<form action="process_add_mock_test.php" method="post">
    <label for="subject_name">Subject Name:</label>
    <select id="subject_name" name="subject_name" required>
        <option value="">Select a subject</option>
        <?php
        if ($result_subjects->num_rows > 0) {
            while ($row = $result_subjects->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($row['subject_name']) . "'>" . htmlspecialchars($row['subject_name']) . "</option>";
            }
        }
        ?>
    </select>

    <label for="num_questions">Number of Questions:</label>
    <input type="number" id="num_questions" name="num_questions" min="1" required>

    <div id="question-container">
        <!-- Question fields will be dynamically added here via JavaScript -->
    </div>

    <button type="submit">Add Mock Test Questions</button>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const numQuestionsInput = document.getElementById("num_questions");
        const questionContainer = document.getElementById("question-container");

        numQuestionsInput.addEventListener("change", function () {
            const numQuestions = parseInt(numQuestionsInput.value);

            // Clear previous question fields
            questionContainer.innerHTML = "";

            // Generate question fields
            for (let i = 1; i <= numQuestions; i++) {
                const questionGroup = document.createElement("div");
                questionGroup.classList.add("question-group");

                questionGroup.innerHTML = `
                    <label for="question_${i}">Question ${i}:</label>
                    <input type="text" id="question_${i}" name="question_${i}" required>

                    <label for="optionA_${i}">Option A:</label>
                    <input type="text" id="optionA_${i}" name="optionA_${i}" required>

                    <label for="optionB_${i}">Option B:</label>
                    <input type="text" id="optionB_${i}" name="optionB_${i}" required>

                    <label for="optionC_${i}">Option C:</label>
                    <input type="text" id="optionC_${i}" name="optionC_${i}" required>

                    <label for="optionD_${i}">Option D:</label>
                    <input type="text" id="optionD_${i}" name="optionD_${i}" required>

                    <label for="answer_key_${i}">Answer Key:</label>
                    <select id="answer_key_${i}" name="answer_key_${i}" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                `;

                questionContainer.appendChild(questionGroup);
            }
        });
    });
</script>

</body>
</html>
