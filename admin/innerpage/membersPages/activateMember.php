<?php
//Firstly check if this user are exists
$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
$stmt = $conn->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
$stmt->execute(array($userid));
$count = $stmt->rowCount();
if ($count > 0) {
//If exist delete this user
    $stmt = $conn->prepare("UPDATE users SET RegStatus = 1 WHERE UserID = ?");
    $stmt->execute(array($userid));
    $row = $stmt->rowCount();
    $message = "<div class='alert alert-success'>.$row .Record Update Status</div>";
    redirect2Page('Members', 'members.php', $message, 4);
} else
    echo 'Not Exist!';






