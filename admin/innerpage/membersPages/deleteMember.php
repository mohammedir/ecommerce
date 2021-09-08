<?php
//Firstly check if this user are exists
$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
$stmt = $conn->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
$stmt->execute(array($userid));
$count = $stmt->rowCount();
if ($count > 0) {
//If exist delete this user
    $stmt = $conn->prepare("DELETE FROM users WHERE UserID = :userid");
    $stmt->bindParam(":userid", $userid);
    $stmt->execute();
    echo 'This User was deleted successfully!';
} else
    echo 'Not Exist!';






