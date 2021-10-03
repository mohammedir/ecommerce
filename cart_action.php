<?php
session_start();

include "includes/functions/functions.php";

$servername = "localhost";
$username = "Mohammed";
$password = "";
$dbname = "ecoca";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    addToCart($conn);
    CheckQuantity($conn);

    //include "uploadImageItem.php";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


function addToCart($conn)
{
    if (isset($_POST['action'])) {
        if (isset($_SESSION['Username'])) {

            $p_id = $_POST["proId"];
            $namecart = $_POST['name'];
            $pricecart = $_POST['price'];
            $userName = $_SESSION['Username'];

            $stmt = $conn->prepare("SELECT * FROM cart WHERE pId = '$p_id' AND userName = '$userName'");
            $stmt->execute();
            $count = $stmt->fetch();
            if ($count > 0) {
                echo 'exists';
            } else {
                foreach (getProducts() as $row) {
                    $itemId = $row['itemID'];
                    $itemName = $row['Name'];
                    $itemPrice = $row['Price'];
                    $itemMember = $row['MemberID'];

                    if ($p_id == $itemId) {
                        /*$stmt = $conn->prepare("INSERT INTO cart(cart_Name, cart_Price) VALUES(:cart_Name,:cart_Price");*/
                        $stmt = $conn->prepare("INSERT INTO cart(cartName, cartPrice,cartDate,pId,userid,userName,QuantityIncart) VALUES(:cartname,:cartPrice,now(),:pId,:userid,:userName,1)");
                        $stmt->execute(array(
                            'cartname' => $itemName,
                            'cartPrice' => $itemPrice,
                            'userid' => $itemMember,
                            'pId' => $p_id,
                            'userName' => $_SESSION['Username']
                        ));
                        echo 'add';
                    }

                }

            }
           /* if (isset($_SESSION['count_item'])){

                $username = $_SESSION['Username'];
                $stmt = $conn->prepare("SELECT * FROM cart WHERE userName = '$username'");
                $stmt->execute();
                $cou = $stmt->fetchAll();
                $countwhith = count($cou);
                echo $countwhith;

            }*/
        } else {
            if (isset($_SESSION['cart'])) {
                $item_array_id = array_column($_SESSION['cart'], 'proId');
                if (in_array($_POST['proId'], $item_array_id)) {
                    echo "<script> alert('Product is already in the cart...!')</script>";
                } else {
                    $count = count($_SESSION['cart']);
                    $item_array = array('proId' => $_POST['proId']);
                    $_SESSION['cart'][$count] = $item_array;
                    echo "add";
                }
            } else {
                $item_array = array(
                    'proId' => $_POST['proId']
                );
                //Create new session variable
                $_SESSION['cart'][0] = $item_array;
                echo "add";
            }

        }
    }
    if (isset($_POST['count_item'])){
        $username = $_SESSION['Username'];
        $stmt = $conn->prepare("SELECT * FROM cart WHERE userName = '$username'");
        $stmt->execute();
        $cou = $stmt->fetchAll();
        $countwhith = count($cou);
        echo $countwhith;
    }
}

function CheckQuantity($conn){
    if (isset($_POST["plusQuantity"])){

        $id = $_POST['cartID'];
        $qty = $_POST['quantity'];
        $stmt = $conn->prepare("UPDATE cart SET QuantityIncart = ? WHERE cartID =?");
        $stmt->execute(array($qty,$id));
        echo "CheckQuantity";

    }elseif (isset($_POST["minusQuantity"])){
        $id = $_POST['cartID'];
        $qty = $_POST['quantity'];
        $stmt = $conn->prepare("UPDATE cart SET QuantityIncart = ? WHERE cartID = ?");
        $stmt->execute(array($qty,$id));
        echo "CheckQuantity";
    }

}

?>