<?php
/*Page Title*/
function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else
        echo "Page";
}

function getAds(){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM ads");
    $stmt->execute();
    return $stmt->fetchAll();
}
function getcarts(){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM cart");
    $stmt->execute();
    return $stmt->fetchAll();
}
function getpidAndqtyCart(){
    global $conn;
    $userName = $_SESSION['Username'];
    $stmt = $conn->prepare("SELECT pId,QuantityIncart	FROM cart WHERE userName ='$userName'");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getpaypal(){
    global $conn;
    $stmt = $conn->prepare("SELECT a.itemID,a.Name,a.Price,a.Image,b.cartID,b.QuantityIncart FROM items a,cart b WHERE a.itemID=b.pId AND b.userName='$_SESSION[Username]'");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getProducts()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM items");
    $stmt->execute();
    return $stmt->fetchAll();
}
function getProductsLimit($limit)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM items LIMIT $limit");
    $stmt->execute();
    return $stmt->fetchAll();
}


function getCategories()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM categoris");
    $stmt->execute();
    return $stmt->fetchAll();
}
function insertOrder($userName,$product_id,$qty,$trx_id,$p_st){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO orders(user_name,product_id,qty,trx_id,p_status) VALUES(:username,:product_id,:qty,:trx_id,:p_status)");
    $stmt->execute(array(
        'username' => $userName,
        'product_id' => $product_id,
        'qty' => $qty,
        'trx_id' => $trx_id,
        'p_status' => $p_st,

    ));
}
function deletCart_afterpayment($userName){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM cart WHERE userName = '$userName' ");
    $stmt->execute();

}
function wrap_tag($argument){
    return '<b>' .$argument. '</b>';
}


function make_avatar($character)
{
    $path = "avatar/". time() . ".png";
    $image = imagecreate(200, 200);
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);
    $textcolor = imagecolorallocate($image, 255,255,255);

    imagettftext($image, 100, 0, 55, 150, $textcolor, 'font/arial.ttf', $character);
    //header("Content-type: image/png");
    imagepng($image, $path);
    imagedestroy($image);
    return $path;
}

function Get_user_avatar($user_id)
{
    global $conn;

    $query = "
 SELECT user_avatar FROM register_user 
    WHERE register_user_id = '".$user_id."'
 ";

    $statement = $conn->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    foreach($result as $row)
    {
        echo '<img src="'.$row["user_avatar"].'" width="75" class="img-thumbnail img-circle" />';
    }
}
