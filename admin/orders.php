<?php
/*
 * You can Delete | Add | Edit orders from here
 */
ob_start();
session_start();
$pageTitle = 'Orders';
if (isset($_SESSION['Username'])) {
    include 'init.php';
    //If the get page is exist get the page else get main page "Manage"
    $page = isset($_GET['page']) ? $_GET['page'] : 'Manage';
    if ($page == 'Manage') {
        include 'innerpage/orderPages/manageOrder.php';
    } elseif ($page == 'Edit') {
        include $inmempg . 'editMember.php';
    } elseif ($page == 'Delete') {
        include $inmempg . 'deleteMember.php';
    } elseif ($page == 'Activate') {
        include $inmempg . 'activateMember.php';
    } elseif ($page == 'Update') {
        include $inmempg . 'updateMember.php';
    } elseif ($page == 'Add') {
        include $inmempg . 'addMember.php';
    } elseif ($page == 'Insert') {
        include $inmempg . 'insertMember.php';
    } else {
        echo 'error not found this page';
    }
    /* include $tpl .'footer.php';*/
} else {
    header('Location:login.php');
    exit();
}
ob_end_flush();//Release the Output