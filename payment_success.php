<?php

session_start();
if(!isset($_SESSION["Username"])){
    header("location:index.php");
}

if (isset($_GET["st"])) {

    # code...
    $trx_id = $_GET["tx"];
    $p_st = $_GET["st"];
    $amt = $_GET["amt"];
    $cc = $_GET["cc"];
    $userName = $_SESSION['Username'];
    if ($p_st == "Completed") {

            echo $trx_id;
            echo $p_st;
            echo $cc;
            echo $userName;
        include_once("connect.php");
        include_once("includes/functions/functions.php");
        if (getpidAndqtyCart() >0){
            foreach (getpidAndqtyCart() as $row){
                $product_id[] = $row["pId"];
                $qty[] = $row["QuantityIncart"];
            }
            for ($i=0; $i < count($product_id); $i++) {
                insertOrder($userName,$product_id[$i],$qty[$i],$trx_id,$p_st);
            }
            deletCart_afterpayment($userName);

        }


    }
}



?>

















































