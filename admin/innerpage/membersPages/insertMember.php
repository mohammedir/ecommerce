<?php
echo "<h1 class='text-center'>Insert Member</h1>";
echo "<div class='container'></div>";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = sha1($_POST['password']);
    $formErrors = array();
    if (strlen($username) < 4)
        $formErrors[] = '<div class="alert alert-danger">Username Cant Be Less Than <strong>4 Characters</strong></div>';
    elseif (strlen($username) > 20)
        $formErrors[] = '<div class="alert alert-danger">Username Cant Be More Than <strong>20 Characters</strong></div>';
    elseif (empty($username))
        $formErrors[] = '<div class="alert alert-danger">Username Cant Be <strong>Empty</strong></div>';
    if (empty($fullname))
        $formErrors[] = '<div class="alert alert-danger">Full name Cant Be <strong>Empty</strong></div>';
    if (empty($email))
        $formErrors[] = '<div class="alert alert-danger">Email Cant Be <strong>Empty</strong></div>';

    foreach ($formErrors as $error) {
        echo $error;
    }
    if (empty($formErrors)) {
        //Check user is exists
        $count = checkItem('Username', 'users', $username);
        if ($count > 0) {
            $error = 'This user already exists';
            redirect2Page('Members', 'members.php', $error, 4);
        } else {
            $stmt = $conn->prepare("INSERT INTO users(Username, Email,Password, FullName,RegStatus,Date) VALUES(:username,:email,:password,:fullname,1,now())");
            if ($stmt->execute(array(
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'fullname' => $fullname))) {
                echo "<div class='alert alert-success'>" . 'Successfully Insert</div>';
            } else {
                echo 'Failed Update';
            }
        }
    }

} else {
    $error = 'Some things error!';
    redirect2Page('Members', 'members.php', $error, 4);
}
echo '</div>';