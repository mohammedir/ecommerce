<?php

session_start();
include 'selectLanguage.php';
include 'initmain.php';

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if ($value['item_id'] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...! ')</script>";
            }
        }
    }
}

?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div style="padding: 3% 0;" class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php
                $total = 0;
                if (isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'],'item_id');
                        foreach (getProducts() as $row){
                            foreach ($product_id as $id){
                            $img = $row['Image'];
                            $name = $row['Name'];
                            $itemid = $row['itemID'];
                            if ($itemid == $id){
                                $price = $row['Price'];
                                $total = $total + (int)$price ;
                                ?>
                                <form action="cart.php?action=remove&id=<?php echo $itemid?>" method="post" class="cart-items">
                                    <div class="border rounded">
                                        <div class="row bg-white">
                                            <div class="col-md-3 p-lg-0">
                                                <img src=<?php echo "uploads/$img" ?> alt="image1" class="img-fluid">
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="pt-2"><?php echo "$name";?></h5>
                                                <small class="text-secondary">Seller:dallytultion</small>
                                                <h5 class="pt-2"><?php echo $price?></h5>
                                                <button type="submit" class="btn btn-warning">Save for Later</button>
                                                <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
                                            </div>
                                            <div class="col-md-3 py-5">
                                                <div>
                                                    <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                                                    <input type="text" value="1" class="form-control w-25 d-inline">
                                                    <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>





                    <?php
                            }
                           }

                    }
                }else{
                    echo "<h4>Cart is Empty</h4>";
                }



                ?>

            </div>

        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETALLS</h6>
                <hr>
                <div class="row price-details"></div>
                     <div class="col-md-6">
                         <?php
                            if (isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<h6>Price ($count items):<span style='padding: 3px;color: red'>$$total</span></h6>";
                            }else{
                                echo "<h6>Price(0 items)</h6>";
                            }
                         ?>
                         <h6>Delivery Charges:<span style="padding: 3px" class="text-success">FREE</span></h6>
                         <hr>
                         <h6>Amount Payable</h6>
                     </div>
                     <div class="col-md-6">
                         <h6>$<?php echo $total ?></h6>
                        <?php
                            if (!isset($_SESSION['Username'])) {
                                echo "<a class='btn btn-success'>Buy</a>";
                            }else{
                                echo  "<a class='btn btn-danger'>Buy</a>";
                            }
                        ?>


                     </div>

            </div>
        </div>

    </div>

</div>
