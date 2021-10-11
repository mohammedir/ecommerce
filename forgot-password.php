<?php
session_start();
include('includes/functions/functions.php');
// Include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/Exception.php';
require 'includes/SMTP.php';

// Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form action="forgot-password.php" method="POST" autocomplete="">
                <h2 class="text-center">Forgot Password</h2>
                <p class="text-center">Enter your email address</p>
                <?php
                if (isset($_POST['check-email'])){
                    $email = trim($_POST['email']);


                    $codeForget = rand(100000, 999999);



                    $query = "
  UPDATE users SET codeforget ='$codeForget' WHERE 	Email ='$email'
  ";

                    $statement = $conn->prepare($query);

                    if($statement->execute())
                    {
                        // Create instance of phpmailer
                        $mail = new PHPMailer();
                        // Set mailer to use smtp
                        $mail->isSMTP();
                        // define smtp host
                        $mail->Host = "smtp.gmail.com";
                        // enable smtp authentication
                        $mail->SMTPAuth = "true";
                        // set type of encryption(ssl/tls)
                        $mail->SMTPSecure = "tls";
                        // set port to connect smtp
                        $mail->Port = "587";
                        // set gmail username
                        $mail->Username = "mohammed.f.irheem@gmail.com";
                        // set gmail password
                        $mail->Password = "Mohammed-0597750487";
                        // set email subject
                        $mail->Subject = "Test Email Using PHPMailer";
                        // set sender email
                        $mail->setFrom("mohammed.f.irheem@gmail.com");
                        // Enable HTML
                        $mail->isHTML(true);
                        // Email body
                        $mail->Body = "<h1>This is code for new password </h1></br><p>$codeForget</p>";
                        // Add recipient
                        $mail->addAddress($email);
                        // Finally send email
                        if ($mail->send()) {
                            echo "Email Sent ..!";
                            header('location:reset-code.php?code='.$email);

                        } else {
                            echo "Error..!";
                        }
                        // Closing smtp connection
                        $mail->smtpClose();

                    }

                }

                ?>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Enter email address" >
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="check-email" value="Continue">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>