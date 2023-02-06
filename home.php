<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="signup()">Sign Up</button>
            </div>
            <div class="social-icons">
                <img src="images/fb.png" alt="">
                <img src="images/tw.png" alt="">
                <img src="images/gp.png" alt="">
            </div>
            <form id="login" class="input-group" action="code.php" method="post">
                <input type="text" class="input-field" placeholder="User Id" required>
                <input type="text" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="login-btn">Log In</button>
            </form>
            <form id="signup" class="input-group" action="code.php" method="post">
                <input type="text" class="input-field" name="userid" placeholder="User Id" required>
                <input type="email" class="input-field" name="email" placeholder="Enter Email Id" required>
                <input type="text" class="input-field"  name="password" placeholder="Enter Password" required>
                <!-- <input type="text" class="input-field" placeholder="Re-Enter Password" required> -->
                <input type="checkbox" class="check-box"><span>I agree to the terms and conditions</span>
                <button type="submit" class="register-btn">Register</button>
            </form>
        </div>
       
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("signup");
        var z = document.getElementById("btn");

        function signup(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>
</html>