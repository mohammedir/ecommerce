<?php
/*
 * You can Delete | Add | Edit categories from here
 */
ob_start();
session_start();
$pageTitle = 'Categories';

if (isset($_SESSION['Username'])) {
    include 'init.php';
    //If the get page is exist get the page else get main page "Manage"
    $page = isset($_GET['page']) ? $_GET['page'] : 'Manage';
    if ($page == 'Manage') {
        include $incatpg . 'manageCategories.php';
    } elseif ($page == 'Edit') {
        include $incatpg . 'editCategories.php';
    } elseif ($page == 'Delete') {
        include $incatpg . 'deleteCategories.php';
    }  elseif ($page == 'Update') {
        include $incatpg . 'updateCategories.php';
    } elseif ($page == 'Add') {
        include $incatpg . 'addCategories.php';
    } elseif ($page == 'Insert') {
        include $incatpg . 'insertCategories.php';
    } else {
        echo 'error not found this page';
    }
    /* include $tpl .'footer.php';*/
} else {
    header('Location:login.php');
    exit();
}
ob_end_flush();//Release the Output