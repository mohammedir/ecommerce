<!--Home page to start admin section in the project
or you can use the same page for user but you must change the GroupID in the query $stmt -->
<?php
session_start();//It's like share preference in android to save the user login or any other data
$noNavbar = '';//here this var to not allow showing navbar here
$pageTitle = 'Login'; //Name this page you need to include this line in all page in the project
include('init.php');//Include init page to include all path and another required includes must include this file in all page in the project

if (isset($_SESSION['Username'])) { //Check If the admin login or not if is login so continue to next page 'dashboard page'
    header('Location: dashboard.php');//Redirect To Dashboard Page
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPass = sha1($password);
    $stmt = $conn->prepare("SELECT UserID,Username, Password FROM users WHERE Username = ? AND Password = ? AND GroupID = 1 LIMIT 1");
    // we need to get the data as array we use fetch()
    $stmt->execute(array($username, $hashedPass));
    $count = $stmt->rowCount();
    echo $count;
    $row = $stmt->fetch();
    print_r($row);
    if ($count > 0) { //Check if the admin is exists
        $_SESSION['Username'] = $username; //Register session name
        $_SESSION['ID'] = $row['UserID']; //Register session ID
        header('Location: dashboard.php');//Redirect To Dashboard Page
        exit();
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

<!--to close the body html you must include the footer-->
<?php
include $tpl . 'footer.php';
?>
