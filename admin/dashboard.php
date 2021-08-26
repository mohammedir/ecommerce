<?php
session_start();//It's like share prefrence in android to save the user login or any other data
include 'init.php';
if (isset($_SESSION['Username'])) { //Check If the admin login in or not if is login so continue to next page
    echo 'Welcome ' . $_SESSION['Username'];
}else{
    //echo 'You are not Authorized to view this page';
    header('location:index.php');
    exit();
}