<!--Home page to start admin section in the project
or you can use the same page for user but you must change the GroupID in the query $stmt -->
<?php
session_start();//It's like share preference in android to save the user login or any other data
$noNavbar = '';//here this var to not allow showing navbar here
$pageTitle = 'Login'; //Name this page you need to include this line in all page in the project
include('initmain.php');//Include init page to include all path and another required includes must include this file in all page in the project
$error = '';
$sol = '';
//include 'connect.php';

if (isset($_SESSION['Username'])) { //Check If the admin login or not if is login so continue to next page 'dashboard page'
    if ($_SESSION['GroupID'] == 0) {//user
        header('Location: index.php');//Redirect To Dashboard Page
    } elseif ($_SESSION['GroupID'] == 1) {//admin
        header('Location: admin/dashboard.php');//Redirect To Dashboard Page
    } elseif ($_SESSION['GroupID'] == 2) {//seller
        header('Location: seller/dashboard.php');//Redirect To Dashboard Page
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPass = sha1($password);
    //Get Group ID for the user login
    if (!empty($username) && !empty($hashedPass)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ? AND Password = ? LIMIT 1");
        $stmt->execute(array($username, $hashedPass));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        if ($count > 0) { //Check if the account is exists
            $error = '';
            $sol = '';
            $groupID = $row['GroupID'];
            $_SESSION['Username'] = $username; //Register session name
            $_SESSION['ID'] = $row['UserID']; //Register session ID
            $_SESSION['GroupID'] = $groupID; //Register session GroupID
            //Select main windows to show for all custom user
            if ($groupID == 0) {//user
                header('Location: index.php');//Redirect To Dashboard Page
            } elseif ($groupID == 1) {//admin
                header('Location: admin/dashboard.php');//Redirect To Dashboard Page
            } elseif ($groupID == 2) {//seller
                header('Location: seller/dashboard.php');//Redirect To Dashboard Page
            }
            exit();
        } else {
            $error = "You have not account";
            $sol = 'Register Now';
        }
    }
}
?>
<!--Start login box-->
<div class="login-body">
    <div class="login-box">
        <div class="login-boy">
            <h2>Login</h2>
            <p class="text-danger"><?php echo $error; ?> <a href='registerUser.php'><strong> <?php echo $sol; ?></strong></a></p>
            <form class="form row" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <ul>
                    <li>
                        <input class="form-control" type="text" name="username" placeholder="Username"
                               autocomplete="off">
                    </li>
                    <li>
                        <input class="form-control" type="password" name="password" placeholder="Password"
                               autocomplete="off">
                    </li>
                    <li>
                        <input class="btn" type="submit" name="submit" value="Login">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<!--End login box-->

<!--to close the body html you must include the footer-->
<?php
include $tpl . 'footer.php';
?>
