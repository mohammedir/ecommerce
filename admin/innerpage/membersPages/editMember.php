<?php
$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
$stmt = $conn->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
$stmt->execute(array($userid));
$count = $stmt->rowCount();
$row = $stmt->fetch();
if ($count > 0) { ?>
    <div class="edit-member text-center">
        <div class="container">
            <h1 class="content ">
                Edit <?php echo $_SESSION['Username'] ?>
            </h1>
            <form class="content" method="POST" action="?page=Update">
                <ul>
                    <li>
                        <input class="input" type="hidden" name="userid" value="<?php echo $userid ?>">
                    </li>
                    <li>
                        <input class="input" type="text" name="username" placeholder="Username"
                               value="<?php echo $row['Username'] ?>" autocomplete="aff" required="required">
                    </li>
                    <li>
                        <input class="input" type="hidden" name="oldpassword" placeholder="Old Password"
                               value="<?php echo $row['Password'] ?>">
                        <input class="input" type="password" name="newpassword" placeholder="New Password"
                               autocomplete="aff"
                               required="required">
                    </li>
                    <li>
                        <input class="input" type="email" name="email" placeholder="Email"
                               value="<?php echo $row['Email'] ?>"
                               autocomplete="aff" required="required">
                    </li>
                    <li>
                        <input class="input" type="text" name="fullname" placeholder="Full Name"
                               value="<?php echo $row['FullName'] ?>" autocomplete="aff" required="required">
                    </li>
                    <li>
                        <input class="button" type="submit" name="save" value="Save">
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <?php
} else {
    $error = 'Not Exist!';
    redirect2Page('Home','index.php', $error, 4);
}
?>





