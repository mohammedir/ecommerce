<?php
session_start();
include "initmain.php";
?>
<div class="item">
    <div class="container-fluid">
        <div class="row">

            <div class="col-one col-sm-12 col-md-12 col-lg-4">
                <?php
                 foreach (getProducts() as $row){
                     $itemID = $row['itemID'];
                     $itemImage = $row['Image'];
                     $name = $row['Name'];


                if ($_GET['itemid'] == $itemID) {
                         echo "<img src='uploads/$itemImage' alt=''>";
                     ?>
            </div>

            <div class="col-two col-sm-12 col-md-12 col-lg-4">
                <div class="item-details text-start">
                    <div>
                        <?php
                       echo "<h5>$name</h5>";
                        }

                 }
                ?>
                    </div>
                    <div class="rating-body">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5"/>
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4"/>
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3"/>
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2"/>
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1"/>
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                    <div class="rating-detail-card container">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-4 border-right">
                                    <div class="ratings text-center p-4 py-5"><span class="badge bg-success">4.1 <i
                                                    class="fa fa-star-o"></i></span> <span
                                                class="d-block about-rating">VERY GOOD</span>
                                        <span class="d-block total-ratings">183 ratings</span></div>
                                </div>
                                <div class="col-md-8">
                                    <div class="rating-progress-bars p-3 mt-2">
                                        <div class="d-flex align-items-center"><span class="stars"> <span>5 <i
                                                            class="fa fa-star text-success"></i></span> </span>
                                            <div class="col px-2">
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                         style="width: 80%;" aria-valuenow="25" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <span class="percent"> <span>80%</span> </span>
                                        </div>
                                        <div class="d-flex align-items-center"><span class="stars"> <span>4 <i
                                                            class="fa fa-star text-custom"></i></span> </span>
                                            <div class="col px-2">
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-custom" role="progressbar"
                                                         style="width: 65%;" aria-valuenow="25" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <span class="percent"> <span>65%</span> </span>
                                        </div>
                                        <div class="d-flex align-items-center"><span class="stars"> <span>3 <i
                                                            class="fa fa-star text-primary"></i></span> </span>
                                            <div class="col px-2">
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                         style="width: 55%;" aria-valuenow="25" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <span class="percent"> <span>55%</span> </span>
                                        </div>
                                        <div class="d-flex align-items-center"><span class="stars"> <span>2 <i
                                                            class="fa fa-star text-warning"></i></span> </span>
                                            <div class="col px-2">
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 35%;" aria-valuenow="25" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <span class="percent"> <span>35%</span> </span>
                                        </div>
                                        <div class="d-flex align-items-center"><span class="stars"> <span>1 <i
                                                            class="fa fa-star text-danger"></i></span> </span>
                                            <div class="col px-2">
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: 65%;" aria-valuenow="25" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <span class="percent"> <span>65%</span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    <?php
                    foreach (getProducts() as $row) {
                        $img = $row['Image'];
                        $name = $row['Name'];
                        $desc = $row['Description'];
                        $price = $row['Price'];
                        $rating = $row['Rating'];
                        $itemid = $row['itemID'];
                        $cartmemberID = $row['MemberID'];
                        $Quantity = $row['Quantity'];
                        if ($_GET['itemid'] == $itemid) {
                            echo "<form  method='post'>";
                            /*echo '<div class="col-sm-4 col-md-3 col-lg-2">
                            <a href="item.php?item="  target="_blank" class="card">';*/
                            echo "<p>Quantity:$Quantity</p> <p>$desc</p> <h5><small><s class='text-secondary'>$10</s></small> $$price</h5> 
                          <button class='btn btn-warning my-3 add_cart' type='submit' name='add' pid='$itemid' id='addcart'>Add to cart<i style='color: white' class='fas fa-shopping-cart'></i></button>
                          <input type='hidden' name='item_id' value='$itemid' pid='$itemid'>
                          <input type='hidden' name='item_image' value='$img' id='img'>
                          <input type='hidden' name='item_name' value='$name' id='namecart'>
                          <input type='hidden' name='item_price' value='$price' id='pricecart'>
                          <input type='hidden' name='cartmemberID' value='$cartmemberID' id='cartmemberID'>
                        </div> </a></form></div>";
                        }
                    }
                    ?>
                    </div>

                </div>
            </div>
            <div class="col-three col-sm-12 col-md-12 col-lg-4">
                <p>Recommend for you</p>
                <div>
                    <?php
                    //print_r(getProducts()) ;
                    foreach (getProductsLimit(3) as $row) {
                        $img = $row['Image'];
                        $name = $row['Name'];
                        $price = $row['Price'];
                        $rating = $row['Rating'];
                        echo '<div class="text-center"><a class="href-item" href="">';
                        echo "<img class='card card-img-top' src='uploads/$img' alt=''> <div class='card-body'>";
                        echo "<h6>$price$</h6>  </div> </a></div>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
