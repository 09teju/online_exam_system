<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- Add your CSS styling here -->
    <style>
        
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body{
    background-color: #c9d6ff;
    background: linear-gradient(to right, #e2e2e2, #c9d6ff);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
}

label {
            display: block;
            margin-bottom: 5px;
        }
.container{
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
}

.container form{
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    height: 100%;
}
.form-container{
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.container p{
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.3px;
    margin: 20px 0;
}

.sign-in{
    left: 0;
    width: 50%;
    z-index: 2;
}

.toggle-container{
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 100px;
    z-index: 1000;
}

.container.active .toggle-container{
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
}

.toggle{
    background-color: #512da8;
    height: 100%;
    background: linear-gradient(to right, #5c6bc0, #512da8);
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}


.toggle-panel{
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}




.toggle-right{
    right: 0;
    transform: translateX(0);
}





.container button{
    background-color: #512da8;
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    margin-left: -10px;
    cursor: pointer;
}

.container button.hidden{
    background-color: transparent;
    border-color: #fff;
}

.user-pass{
    margin-left: 25px;
}


.heading1 {
    width: 106.99px; 
    height: 39.08px; 
    color: #000000; 
    font-size: 33px; 
    font-family: 'Montserrat', sans-serif; 
    margin-bottom: 15px;
    margin-left: 0px;
    margin-right: 145px;
    display: inline;
    white-space: nowrap;

}

input {
    width: 229px; 
    height: 35.88px; 
    background: #EEEEEE; 
    margin: 8px 0px; 
    padding: 10px;
    padding-right: 25px; 
    padding-left: 10px;
    border: 0px solid #ccc; 
    border-radius: 5px; 
    font-size: 16px; 
}

a {
            width: 124.13px;
            height: 15.88px;
            color: #333333;
            font-size: 13px;
            font-family: 'Montserrat', sans-serif;
            margin: 15px 0px 10px; /* Adjusted syntax for margin */
        }

        span {
            width: 75.07px;
            height: 14.66px;
            color: #0000FF;
            font-size: 12px;
            font-family: 'Montserrat', sans-serif;
            margin-left:70px;
            
        }



    </style>
</head>
<body>
<div class="container" id="container">
<div class="form-container sign-in">


<form action="process_student_register.php" method="post">
<h1 class="heading1">Student Registration</h1>
<div class="user-pass">
    <label for="name" style="font-size:2px; color:white;">Name:</label>
    <input type="text" id="name" name="name" placeholder="Name" required>

    <label for="age" style="font-size:2px; color:white;">Age:</label>
    <input type="number" id="age" name="age" placeholder="Age" required>

    <label for="educational_qualification" style="font-size:2px; color:white;">Educational Qualification:</label>
    <input type="text" id="educational_qualification" name="educational_qualification" placeholder="Educational Qualification" required>

    <label for="userid" style="font-size:2px; color:white;">USERID:</label>
    <input type="text" id="userid" name="userid" placeholder="Username" required>

    <label for="password" style="font-size:2px; color:white;">Password:</label>
    <input type="password" id="password" name="password" placeholder="Password" required>
</div>
    <a href="student_login.php">
    <button type="submit" class="button">Register</button>
    </a>
</form>
</div>
<div class="toggle-container">
            <img src="https://tse3.mm.bing.net/th?id=OIP.yK9B_9hZ1pm4jcq9NVfphAHaEc&pid=Api&P=0&h=220"></img>
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1 style="margin-top: -250px;">WELCOME TO ONLINE EXAM</h1>
                    
                </div>  
                
            </div>
    </div>
</div>
</body>
</html>
