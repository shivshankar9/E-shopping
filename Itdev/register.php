<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>
<main>
    <form action="register.php" method="post">
        <h1>Sign Up</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password2">Password Again:</label>
            <input type="password" name="password2" id="password2">
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="#" title="term of services">term of services</a>
            </label>
        </div>
        <button type="submit">Register</button>
        <footer>Already a member? <a href="login.php">Login here</a></footer>
    </form>
</main>
</body>
</html>
<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $agree = $_POST['agree'];

    // Validate the form data here...
    // Check if the username is not empty
if (empty($username)) {
    $error_message = 'Username is required';
}

// Check if the email is not empty and is a valid email address
if (empty($email)) {
    $error_message = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_message = 'Email is not valid';
}

// Check if the password is not empty and is at least 6 characters long
if (empty($password)) {
    $error_message = 'Password is required';
} elseif (strlen($password) < 6) {
    $error_message = 'Password must be at least 6 characters long';
}

// Check if the two passwords match
if ($password != $password2) {
    $error_message = 'Passwords do not match';
}

// Check if the user agreed with the terms of services
if (empty($agree) || $agree != 'yes') {
    $error_message = 'You must agree with the terms of services';
}

// If there is an error message, stop the script and display the error message
if (isset($error_message)) {
    echo $error_message;
    exit;
}

--------------------------------------------------------------------
    // If the form data is valid, then send the email
    if () {
        // Use PHPMailer to send the email
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'path/to/vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.example.com';                    // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'your-email@example.com';          // SMTP username
            $mail->Password = 'your-email-password';              // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            // Recipients
            $mail->setFrom('from@example.com', 'From Name');
            $mail->addAddress('to@example.com', 'To Name');     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'New User Registration';
            $mail->Body = 'A new user has registered with the following details:<br><br>' .
                'Username: ' . $username . '<br>' .
                'Email: ' . $email . '<br>' .
                'Password: ' . $password . '<br>' .
                'Agree: ' . $agree;

            $mail->send();
            echo 'An email has been sent to notify you of the new user registration.';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

?>
