<?php
echo "<h1 class='text-center'>Update Member</h1>";
echo "<div class='container'></div>";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['userid'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = '';
    $fullname = $_POST['fullname'];
    $password = empty($_POST['newpassword']) ? $password = $_POST['oldpassword'] : $password = sha1($_POST['newpassword']);
    $formErrors = array();
    if (strlen($user) < 4)
        $formErrors[] = '<div class="alert alert-danger">Username Cant Be Less Than <strong>4 Characters</strong></div>';
    elseif (strlen($user) > 20)
        $formErrors[] = '<div class="alert alert-danger">Username Cant Be More Than <strong>20 Characters</strong></div>';
    elseif (empty($user))
        $formErrors[] = '<div class="alert alert-danger">Username Cant Be <strong>Empty</strong></div>';
    if (empty($fullname))
        $formErrors[] = '<div class="alert alert-danger">Full name Cant Be <strong>Empty</strong></div>';
    if (empty($email))
        $formErrors[] = '<div class="alert alert-danger">Email Cant Be <strong>Empty</strong></div>';

    foreach ($formErrors as $error) {
        echo $error;
    }
    if (empty($formErrors)) {
        $stmt = $conn->prepare("UPDATE users SET Username = ?, Email = ?,Password = ?, FullName = ? WHERE UserID = ?");
        if ($stmt->execute(array($user, $email, $password, $fullname, $id))) {
            echo "<div class='alert alert-danger'>" . $stmt->rowCount() . 'Successfully Update</div>';
        } else {
            echo 'Failed Update';
        }
    }

} else {
    echo 'Some things error!';
}
echo '</div>';