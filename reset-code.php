<?php
$conn = new PDO("mysql:host=localhost;dbname=ecoca", "Mohammed", "");

if(isset($_GET["code"])){
    $email_url  = $_GET['code'];
    if (isset($_POST['check-reset-otp'])) {
        $codeforget_opt = $_POST['otp'];
        $query = "
   SELECT * FROM users 
   WHERE Email = '" . $email_url . "' 
   AND codeforget = '" . trim($_POST["otp"]) . "'
   ";

        $statement = $conn->prepare($query);

        $statement->execute();

        $total_row = $statement->rowCount();

        if ($total_row > 0) {
            $query = "
    UPDATE users 
    SET codeforget = 0 
    WHERE Email = '".$email_url."'
    ";
            $statement = $conn->prepare($query);

            if($statement->execute())
            {
                header('location:new_password.php?email='.$email_url);
            }
            }
        }



}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form  method="POST" autocomplete="off">
                <h2 class="text-center">Code Verification</h2>
                <?php



                ?>
                <div class="form-group">
                    <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>