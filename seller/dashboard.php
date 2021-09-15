<?php
session_start();
$pageTitle = 'Dashboard';
if (isset($_SESSION['GroupID'])) {
    $groupID = $_SESSION['GroupID'];
    if ($groupID == 2)
        include 'init.php'; ?>
    <?php
} else
    header('Location: index.php');

