<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
    <!-- Add your CSS styling here -->
    <style>
        /* Example CSS styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 20px;
            
            border: none;
            cursor: pointer;
            background-color: #D6EEEE; 
            color: black;"
        }
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
img {vertical-align: middle;
}

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
  <a class="active" href="courses.php">BACK</a>
  
  <div class="topnav-right">
    <a href="courses.php">Courses</a>
    <a href="mock_test.php">Mock Test</a>
    <a href="exam.php">Exam</a>
    <a href="student.php">Student</a>
    <a href="result.php">Result</a>
    <a href="logout.php">Logout</a>
  </div>
</div>


<!-- Form for adding new subject -->
<h3>Add New Subject</h3>
<div class="container">
<form method="post" enctype="multipart/form-data" action="upload_study_material.php">
  <div class="row">
    <div class="col-25">
    <label for="subject_name">Subject Name:</label>
    </div>
    <div class="col-75">
    <input type="text" id="subject_name" name="subject_name" required><br><br>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="tutorials">Upload Tutorial (PDF):</label>
    </div>
    <div class="col-75">
    <input type="file" id="tutorials" name="tutorials" accept=".pdf" required><br><br>
    </div>
  </div>
 
  <div class="row">
  <button type="submit" name="submit">Add Subject</button>
  </div>
  </form>
</div>

</body>
</html>
