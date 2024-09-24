<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Online Exam Platform</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 768px;
            max-width: 100%;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .text-container {
            max-width: 60%;
            padding-right: 20px;
        }
        .text-container p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            text-align: justify;
            margin-bottom: 15px;
        }
        .highlight {
            color: #512da8;
            font-weight: bold;
        }
        .image-container {
            margin-top: 10px;
            max-width: 35%;
        }
        .image-container img {
            width: 100%;
            border-radius: 15px;
        }
        
        select {
            margin-top: -10.5px;
            padding: 8px;
            font-size: 14px;
            color: #555;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        h1 {
            font-size: 24px;
            color: #512da8;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-container">
            <h1>Welcome to Our Online Learning Platform!</h1>
            <p>Welcome to our <span class="highlight">online learning and examination platform</span>! This innovative platform is designed to offer a comprehensive and interactive learning experience.</p>
            <p>Here, you can explore a diverse range of courses across various subjects, enhancing your knowledge and skills at your own pace. After studying a course, take an exam to assess your understanding and measure your progress.</p>
            <p>Our platform features a seamless, user-friendly interface that helps you focus on your studies and excel in your exams. Embark on this educational journey with us and experience the joy of learning and self-assessment. Let's achieve excellence together!For further details please <a href="contact.php" style="color: #512da8">
        contact us
        </a></p>
            
            <label for="dropdown">You are signing up as?</label>
            <select id="dropdown" name="dropdown" onchange="redirectToPage()">
                <option value="">Select...</option>
                <option value="index.php">Admin</option>
                <option value="student_login.php">Student</option>
            </select>
            
        </div>
        <div class="image-container">
            
            <img src="https://examonline.in/wp-content/uploads/2020/11/What-Is-Online-Exam.png" alt="Online Exam Image">
            <img src="https://tse3.mm.bing.net/th?id=OIP.yK9B_9hZ1pm4jcq9NVfphAHaEc&pid=Api&P=0&h=220" alt="Online Exam Image">
            <img src="https://examonline.in/wp-content/uploads/2021/11/blog1.png" alt="Online Exam Image">
            
        </div>
    </div>

    <script>
        function redirectToPage() {
            const dropdown = document.getElementById('dropdown');
            const selectedValue = dropdown.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        }
    </script>
</body>
</html>