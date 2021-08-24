<?php
echo "<h1>Welcome</h1>";

$servername = "sqlXXX.epizy.com";
$username = "epiz_29528000";
$password = "9KOGTskRJGzZR8e";
$dbname = "epiz_29528000_XXX";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
