<?php
session_start();
include('dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendEmailVerify($userid, $email, $verify_token) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            
    $mail->Host = 'smtp.gmail.com';                     
    $mail->SMTPAuth = true;                                   
    $mail->Username = 'nayakbabujsr@gmail.com';                     
    $mail->Password = 'secret';                               
    $mail->SMTPSecure = "tls";            
    $mail->Port = 587;                                    

    $mail->setFrom("nayakbabujsr@gmail.com", $userid);
    $mail->addAddress($email); 
    $mail->isHTML(true);                                  
    $mail->Subject = 'Email verification from e-shopping website';

    $email_template = "
    <h2>You have Registered with E-shopping Website</h2>
    <h5>Verify your email address to Login with the below given link</h5>
    <br/><br/>
    <a href='https://localhost/eshopping/verify-email.php?token=$verify_token'>Click Here</a>";

    $mail->Body = $email_template;

    $mail->send();
}

if (isset($_POST['register-btn'])) {
    $userid = $_POST['userid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email Id already Exists";
        header("Location: home.php");
    } else {
        $query = "INSERT INTO users (userid, email, password, verify_token) VALUES ('$userid', '$email', '$password', '$verify_token')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            sendEmailVerify("$userid", "$email", "$verify_token");

            $_SESSION['status'] = "Registration Successful! Please verify your email address.";
            header("Location: home.php");
        } else {
            $_SESSION['status'] = "Registration Failed";
            header("Location: home.php");
        }
    }
}
?>
