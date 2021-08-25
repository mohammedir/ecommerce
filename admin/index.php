<?php
include('init.php');
include($tpl . 'header.php');
include($lang . 'english.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPass = sha1($password);
    $stmt = $conn->prepare("SELECT Username, Password FROM users WHERE Username = ? AND Password = ? AND GroupID = 1");
    $stmt->execute(array($username, $hashedPass));
    $count = $stmt->rowCount();
    if ($count > 0){
        echo 'Welcome ' . $username;
    }
}
?>

<!--Start login box-->
<div class="login-box">
    <div class="container">
        <h3>Admin Login</h3>
        <form class="form row" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="text" name="username" placeholder="Username" autocomplete="off">
            <input type="password" name="password" placeholder="Password" autocomplete="off">
            <input class="btn" type="submit" name="submit" value="Login">
        </form>
    </div>
</div>
<!--End login box-->
<?php
include $tpl . 'footer.php';
?>
