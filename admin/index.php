<?php
$tpl = '';
$lang = '';
include 'init.php';
include $tpl . 'header.php';
include $lang . 'english.php';
?>
<!--Start login box-->
<div class="login-box">
    <div class="container">
        <h3>Admin Login</h3>
        <form class="form row" method="post">
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
