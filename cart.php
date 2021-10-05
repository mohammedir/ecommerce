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
                $items = 0;
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
                }elseif (isset($_SESSION['Username'])){

                foreach (getcarts() as $row){
                $name = $row['cartName'];
                $itemid = $row['pId'];
                $userName = $row['userName'];
                $QuantityIncart = $row['QuantityIncart'];
                $cartID = $row['cartID'];
                foreach (getProducts() as $row2){
                    $iditem = $row2['itemID'];
                    $img = $row2['Image'];
                    $Quantity = $row2['Quantity'];

                if ($userName == $_SESSION['Username'] && $itemid == $iditem){
                    $price = $row['cartPrice'];
                    $total = $total + ((int)$price*$QuantityIncart) ;
                    $items = $items + $QuantityIncart;
                    ?>
                        <div class="border rounded">
                            <div class="row bg-white">
                                <div class="col-md-3 p-lg-0">
                                    <img src=<?php echo "uploads/$img" ?> alt="image1" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="pt-2"><?php echo "$name";?></h5>
                                    <small class="text-secondary">Seller:dallytultion</small>
                                    <h5 class="pt-2" id="<?php echo "priceid".$cartID?>"><?php echo $price?></h5>
<!--                                    <button type="submit" class="btn btn-warning">Save for Later</button>
-->                                    <button type="submit" class="btn btn-danger mx-2 remove" name="remove" cid='<?php echo $cartID?>'>Remove</button>
                                </div>
                                <div class="col-md-3 py-5">
                                    <div>
                                        <button type="button" class="btn bg-light border rounded-circle minus" cid='<?php echo $cartID?>'><i class="fas fa-minus"></i></button>
                                        <input id="<?php echo "qid".$cartID?>" type="text" value="<?php echo $QuantityIncart?>" class="form-control w-25 d-inline QuantityIncart">
                                        <button type="button" class="btn bg-light border rounded-circle plus" cid='<?php echo $cartID?>'><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                         cartdetails($total,$items);

                            ?>
                     </div>

            </div>
        </div>

    </div>

</div>

<?php

 function cartdetails($total ,$items){
     if (isset($_SESSION['cart'])){
         $count = count($_SESSION['cart']);
         echo "<h6>Price ($count items):<span style='padding: 3px;color: red'>$$total</span></h6>";
     }elseif (isset($_SESSION['Username'])){
         echo "<h6>Price($items items)</h6>";
     }
     ?>
        <h6>Delivery Charges:<span style="padding: 3px" class="text-success">FREE</span></h6>
        <hr>
        <h6>Amount Payable</h6>
        </div>
        <div class="col-md-6">
       <?php echo "<h6 id='total'>$total </h6>"?>

<!--        <h6 id="total".$cartID>$<?php /*echo $total */?></h6>
-->
        <?php
        if (!isset($_SESSION['Username'])) {
        echo "<a class='btn btn-success'>Buy</a>";
        }else{
            echo  '
						</form>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="sb-ckihm7899177@business.example.com">
							<input type="hidden" name="upload" value="1">';

            $x=0;
            foreach (getpaypal() as $row){
                $x++;
                echo
                    '<input type="hidden" name="item_name_'.$x.'" value="'.$row["Name"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["Price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["QuantityIncart"].'">';

            }
            echo
                '<input type="hidden" name="return" value="http://localhost/ecommerceGit/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/ecommerceGit/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/ecommerceGit/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value=""/>
									<input style="float:right;margin-right:80px;" type="image" name="submit"
										src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-small.png" alt="PayPal Checkout"
										alt="PayPal - The safer, easier way to pay online">
										

								</form>';

            }

 }
?>


<script type="text/javascript">
    

   /* function getcart() {

        $.ajax({
            url: "cart_action.php",
            method: "POST",
            data: {'proId': pid, 'name': name, 'price': price, 'action': action},
            success: function (data) {
                if (data == 'get') {
                    alert('get Add')

                }

            }
        })
    }*/
</script>