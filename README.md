# online_exam_system
 HTML | CSS | PHP
Online Examination System

Project Overview :
The Online Examination System is a web-based platform that allows administrators to manage subjects/courses, mock tests, exams, students and view student results, while students can enroll into the courses by viewing study materials, participating in mock tests and exams, and track their results. This system is designed to automate and simplify the examination process while providing additional features like auto-submission, gamification, dual-mode of examination, certifications, and accessibility for students with different study materials.

Features
1. Admin Features
Admin username : teju123
Admin password : teju@123#

Course Management:
Add and delete subjects.
Upload study materials (PDFs) for each course.

Mock Test Management:
Add and delete mock test questions.
Specify correct answers (Answer Key) for evaluation.

Exam Management:
Create exams with a time limit.
Set up the correct answers for automatic grading.

Student Management:
Add and delete student profiles.
View student details and exam results.

Results Management:
View student performance in exams.

2. Student Features
student username: Teju
student password: Teju@123 [you can also register and login, its not necessary to use the same student username and password].
Profile Management:
Register and manage personal profile details by logging in.

Course Enrollment:
View available courses and access study materials uploaded by the admin.
Enrolling of different courses/subjects.

Mock Tests:
Attempt mock tests to practice for the main exams.
View correct and wrong answers after completing mock tests.

Exams:
Participate in timed exams with auto-submit functionality.
View results after submitting exams.

Results:
Tracking exam results.
Earn badges based on performance: Gold Star, Silver Star, or Black Star (Gamification).

Certificates:
Download certificates for exam completion with custom details like student name and subject name.
The eligibility for a student to earn the certificate is that the student should have 100% results in their corresponding exam. 

Technology Stack

Frontend:
HTML: For structuring the web pages.
CSS: For styling and layout.

Backend:
PHP: For server-side logic and handling database operations.
MySQL: For storing user data, test questions, and results.
XAMPP: For local development, running Apache server and MySQL.

Database Structure:
The database includes all the necessary tables which is required for fetching of the corresponding data's such as particular student, subject etc. 


Project Setup
To run the project locally, follow these steps:

1. Prerequisites:
Install XAMPP or any server running PHP and MySQL.
Clone or download the project repository from GitHub.
2. Setting Up the Database:
Open phpMyAdmin on your browser.
Create a new database (e.g., online_exam_system).
Import the provided database.sql file located in the sql/ folder into your newly created database.
3. Configuration:
Open the config.php file located in the root directory and update the port number if necessary.
Eg : if your MySQL is running on the port number 3306 then open the config.php file and update it as
$port = 3306; // Replace with your MySQL port number if different
NOTE: there is another config.php file in the fpdf folder so do update it here and also in the courses.php file as well.
5.FPDF Integration
The project uses FPDF, a popular PHP class for generating PDF files, to create certificates
Installing or Updating FPDF:
FPDF is already included in the project. However, if needed, you can download or update FPDF by following these steps:
Visit the official site: FPDF.org.
Download the latest version and replace the fpdf/ folder in your project directory with the updated one.
6. Running the Project:
Place the project or unzip the folder in the htdocs directory of XAMPP..
Start Apache and MySQL from the XAMPP control panel.
Access the project by visiting http://localhost/online_exam_system-main/main.php in your web browser.

Key Modules and Workflow
1. Admin Workflow:
Login: Admins can log in using their credentials.
Course Management: Add, update, delete subjects, and upload tutorials.
Test Creation: Add mock questions, create exams with a timer, and define correct answers.
View Results: Admins can view detailed reports of student performance.

2. Student Workflow:
Registration/Login: Students register their account and log in to access their profile.
Mock Tests and Exams: Students can take mock tests and final exams with a timer.
Results and Certificates: View results with badges and download certificates of completion.

Features Under Development
Gamification Enhancements: Additional rewards and challenges for students such as gold,silver and black star.
Accessibility Features: More comprehensive support for students by providing study materials.
Dual mode of examination : Students can attend either mock or exam test. Mock test can be attended by the student so that he/she has a good pratice, and the main exam can be attended later.
Auto-submit : once the time is over the exam gets auto submitted.
This project is licensed under the MIT License. See the LICENSE file for more details.

Contact
For any queries or support, please feel free to contact the project maintainer at:

Email: p91159753.com








