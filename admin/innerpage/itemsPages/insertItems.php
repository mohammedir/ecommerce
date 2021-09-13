<?php
$servername = "localhost";
$username = "moomen";
$password = "9124279";
$dbname = "ecoca";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $country = $_POST['country'];

    $stmt = $conn->prepare("INSERT INTO items(Name, Description,Price, Date,Country,Status,Rating,CatID,MemberID) VALUES(:name,:description,:price,now(),:country,0,0,1,27)");
    $stmt->execute(array(
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'country' => $country));
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}