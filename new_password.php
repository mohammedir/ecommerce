<?php
/*$email = $_SESSION['email'];
if($email == false){
    header('Location: login-user.php');
}*/
include "connect.php";

if (isset($_GET['email'])){
    if (isset($_POST['change-password'])){
        $email = 'mohammed.f.irheem@gmail.com';
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if ($password == $cpassword){
            $newPassword = sha1($password);
            $query = "
    UPDATE users 
    SET Password = '$newPassword' 
    WHERE Email = '".$email."'
    ";

            $statement = $conn->prepare($query);

            if($statement->execute())
            {
                header('location:login.php');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form  method="POST" autocomplete="off">
                <h2 class="text-center">New Password</h2>
                <?php

                ?>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="change-password" value="Change">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>