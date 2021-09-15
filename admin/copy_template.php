<?php
/*
 * You can Delete | Add | Edit members from here
 */
ob_start();
session_start();
$pageTitle = '';

if (isset($_SESSION['Username'])) {
    include 'init.php';
    //If the get page is exist get the page else get main page "Manage"
    $page = isset($_GET['page']) ? $_GET['page'] : 'Manage';
    if ($page == 'Manage') {

    } elseif ($page == 'Edit') {

    } elseif ($page == 'Delete') {

    } elseif ($page == 'Activate') {

    } elseif ($page == 'Update') {

    } elseif ($page == 'Add') {

    } elseif ($page == 'Insert') {

    } else {
        echo 'error not found this page';
    }
    /* include $tpl .'footer.php';*/
} else {
    header('Location:login.php');
    exit();
}
ob_end_flush();//Release the Output