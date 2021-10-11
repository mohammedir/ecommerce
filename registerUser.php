<?php

//index.php

//error_reporting(E_ALL);

session_start();

if(isset($_SESSION["user_id"]))
{
    header("location:home.php");
}

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
$message = '';
$error_user_name = '';
$error_user_email = '';
$error_user_password = '';
$user_name = '';
$user_email = '';
$user_password = '';

if(isset($_POST["register"]))
{
    if(empty($_POST["user_name"]))
    {
        $error_user_name = "<label class='text-danger'>Enter Name</label>";
    }
    else
    {
        $user_name = trim($_POST["user_name"]);
        $user_name = htmlentities($user_name);
    }

    if(empty($_POST["user_email"]))
    {
        $error_user_email = '<label class="text-danger">Enter Email Address</label>';
    }
    else
    {
        $user_email = trim($_POST["user_email"]);
        if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
        {
            $error_user_email = '<label class="text-danger">Enter Valid Email Address</label>';
        }
    }

    if(empty($_POST["user_password"]))
    {
        $error_user_password = '<label class="text-danger">Enter Password</label>';
    }
    else
    {
        $user_password = trim($_POST["user_password"]);
        $user_password = sha1($user_password);
    }

    if($error_user_name == '' && $error_user_email == '' && $error_user_password == '')
    {
        $user_activation_code = md5(rand());

        $user_otp = rand(100000, 999999);

        $data = array(
            ':user_name'  => $user_name,
            ':user_email'  => $user_email,
            ':user_password' => $user_password,
            ':user_activation_code' => $user_activation_code,
            ':user_email_status'=> 'not verified',
            ':user_otp'   => $user_otp
        );

        $query = "
  INSERT INTO users /*users*/
  (Username, Email, Password, user_activation_code, user_email_status, user_otp)
  SELECT * FROM (SELECT :user_name, :user_email, :user_password, :user_activation_code, :user_email_status, :user_otp) AS tmp
  WHERE NOT EXISTS (
      SELECT Email FROM users WHERE Email = :user_email
  ) LIMIT 1
  ";

        $statement = $conn->prepare($query);

        $statement->execute($data);

        if($conn->lastInsertId() == 0)
        {
            $message = '<label class="text-danger">Email Already Register</label>';
        }
        else {

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
            $mail->Body = "<h1>This is h1 html heading </h1></br><p>This is html paragraph..$user_otp</p>";
            // Add recipient
            $mail->addAddress($user_email);
            // Finally send email
            if ($mail->send()) {
                echo "Email Sent ..!";
                header('location:email_verify.php?code='.$user_activation_code);

            } else {
                echo "Error..!";
            }
            // Closing smtp connection
            $mail->smtpClose();

        }
    }
}






?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Registration with Email Verification using OTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<br />
<div class="container">
    <h3 align="center">PHP Registration with Email Verification using OTP</h3>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registration</h3>
        </div>
        <div class="panel-body">
            <?php echo $message; ?>
            <form method="post">
                <div class="form-group">
                    <label>Enter Your Name</label>
                    <input type="text" name="user_name" class="form-control" />
                    <?php echo $error_user_name; ?>
                </div>
                <div class="form-group">
                    <label>Enter Your Email</label>
                    <input type="text" name="user_email" class="form-control" />
                    <?php echo $error_user_email; ?>
                </div>
                <div class="form-group">
                    <label>Enter Your Password</label>
                    <input type="password" name="user_password" class="form-control" />
                    <?php echo $error_user_password; ?>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn btn-success" value="Click to Register" />&nbsp;&nbsp;&nbsp;
                    <a href="resend_email_otp.php" class="btn btn-default">Resend OTP</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br />
<br />
</body>
</html>