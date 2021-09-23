<?php
    if(isset($_POST['add'])){
        //print_r($_POST['item_id']);
        if (isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'],'item_id');
            if (in_array($_POST['item_id'],$item_array_id)){
                echo "<script> alert('Product is already in the cart...!')</script>";
            }else{
                $count = count($_SESSION['cart']);
                $item_array = array('item_id' => $_POST['item_id']);
                $_SESSION['cart'][$count] = $item_array;
                echo "<script>window.location ='index.php'</script>";

            }
        }else{
            $item_array = array(
                    'item_id'=>$_POST['item_id']
            );
            //Create new session variable
            $_SESSION['cart'][0]= $item_array;
            echo "<script>window.location ='index.php'</script>";

        }
    }elseif (isset($_POST['add']) && isset($_SESSION['Username'])){

    }
    ?>
<!--Start Slider-->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-one col-sm-12 col-md-12 col-lg-4">
                <h4><i class="fa fa-list-alt" aria-hidden="true"> Categories</i></h4>
                <ul>
                    <?php
                    //print_r(getProducts()) ;
                    foreach (getCategories() as $row) {
                        $name = $row['Name'];
                        $categoriesId = $row['ID'] ?>


                        <form action="categoriesItems.php?action=categories&id=<?php echo $categoriesId?>" method="post" class="cart-items">
                            <button style="border: none; background: none" type="submit"  name="categoriesItems"><?php echo $name?></button>
                        </form>
                    <?php
/*                        echo "<a style='text-decoration: none' href='categoriesItems.php'><li><label class='checkbox'><input type='checkbox'></label> $name</li></a>";*/
                    } ?>
                </ul>
            </div>
            <div class="col-two col-sm-12 col-md-12 col-lg-4">
                <ul>
                    <li class="row-one-col-tow">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <!--<div class="overlay"></div>-->
                                <!--<div class="carousel-item active">
                                    <img src="img/img-3.gif" class="d-block w-100"
                                         alt="slide-img">
                                </div>-->
                                <?php

                                foreach (getAds() as $row){
                                    $active = $row['adsActive'];
                                    $adsitemid = $row['adsItemId'];
                                    echo "<div class='carousel-item $active'>";
                                        $adsimage = $row['adsImage'];
                                        echo "<a href='item.php?itemid=$adsitemid'><img src='uploads/$adsimage' class='d-block w-100' alt='slide-img'></a> ";
                                    echo "</div>";

                                }
                                ?>

                            <div class="carousel-indicators">
                                <?php
                                foreach (getAds() as $row){
                                    $adsID = $row['adsID'] - 1 ;
                                    $adsName = $row['adsName'];
                                    echo "<button type='button' data-bs-target='#carouselExampleIndicators'
                                            data-bs-slide-to='$adsID' class='active' 
                                            aria-current='true' aria-label='$adsName'  >";
                                }

                                ?>
                            </div>
                        </div>
                    </li>
                    <li class="row-two-col-tow">
                        <div class="container">
                            <div class="row">
                                <?php
                                //print_r(getProducts()) ;
                                foreach (getProductsLimit(4) as $row) {
                                    $img = $row['Image'];
                                    $name = $row['Name'];
                                    $price = $row['Price'];
                                    $rating = $row['Rating'];
                                    echo '<div class="text-center item-product col-sm-6 col-md-6 col-lg-3"><a href="" class="card">';
                                    echo "<img class='card-img-top' src='uploads/$img' alt=''> <div class='card-body'>";
                                    echo "<p>$name</p>  <h5>$$price</h5>  </div> </a></div>";
                                } ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-three col-sm-12 col-md-12 col-lg-4 text-center">
                <div class="login-boy">
                    <?php if (!isset($_SESSION['Username'])) { ?>
                        <img class="account-img" src="img/ecoexpress2.png">
                        <h4>Welcome to EcoExpress</h4>
                        <div class="account container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6 button-col">
                                    <a href="registerUser.php" class="join-btn btn">Join</a>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 button-col">
                                    <a href="login.php" class="sign-btn btn">Sign in</a>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <img class="logo-img" src="layout/images/ecoexpress2.png">
                    <?php } ?>
                </div>
                <a href=""><img src="img/p-2.png"></a>
            </div>
        </div>
    </div>
</div>
</div>
<!--End Slider-->

<!--Start Latest post-->
<div class="latest-post" id="output">
    <div class="container">
        <div class="row" >
            <?php
            //print_r(getProducts()) ;
            foreach (getProducts() as $row) {
                $img = $row['Image'];
                $name = $row['Name'];
                $desc = $row['Description'];
                $price = $row['Price'];
                $rating = $row['Rating'];
                $itemid = $row['itemID'];
/*                echo $itemid;*/
                echo "<div class='text-center col-sm-4 col-md-3 col-lg-2'> <a href='item.php?itemid=$itemid' target='_blank' class='card' >";
                echo "<form action='index.php' method='post'>";
                /*echo '<div class="col-sm-4 col-md-3 col-lg-2">
                <a href="item.php?item="  target="_blank" class="card">';*/
                echo "<img class='card-img-top' src='uploads/$img' alt=''> <div class='card-body'>";
                echo "<p>$name</p> <p>$desc</p> <h5><small><s class='text-secondary'>$10</s></small> $$price</h5> 
                          <button class='btn btn-warning my-3' type='submit' name='add'>Add to cart<i style='color: white' class='fas fa-shopping-cart'></i></button>
                          <input type='hidden' name='item_id' value='$itemid'>
                        </div> </a></form></div>";
            } ?>
        </div>
    </div>
</div>
<!--End Latest post-->

<!--Start Statistics-->
<div class="statistics text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div>
                    <i class="fa fa-user fa-4x rounded-circle"></i>
                    <div class="card-body">
                        <h1>624</h1>
                        <h6>March 24 2017</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div>
                    <i class="fa fa-heart fa-4x rounded-circle"></i>
                    <div class="card-body">
                        <h1>112</h1>
                        <h6>March 24 2017</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div>
                    <i class="fa fa-briefcase fa-4x rounded-circle"></i>
                    <div class="card-body">
                        <h1>595</h1>
                        <h6>March 24 2017</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div>
                    <i class="fa fa-comments fa-4x rounded-circle"></i>
                    <div class="card-body">
                        <h1>09</h1>
                        <h6>March 24 2017</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Statistics-->

<!--Start Footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="site-info">
                    <a class="navbar-brand"
                       href="http://tweetytube.epizy.com/"><span>Eco</span><span>Express</span></a>
                    <p>People are doing business with you because they know, like and trust you, period. The
                        relationship
                        and the experience are what open more doors, close more sales and land you more deals.
                        This
                        is a
                        new
                        economy that calls for a new approach Attention to Details It's our attention to the
                        small
                        stuff,
                        scheduling of timelines and keen project management that makes us stand out from the You
                        want
                        results.</p>
                    <a class="read-more" href="http://tweetytube.epizy.com/">Read more</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="helpful-links">
                    <h2>Helpful Links</h2>
                    <div class="row">
                        <div class="col">
                            <ul class="list-unstyled">
                                <li>About</li>
                                <li>Portofolio</li>
                                <li>Team</li>
                                <li>Price</li>
                                <li>Privacy</li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-unstyled">
                                <li>FAQ</li>
                                <li>Blog</li>
                                <li>How it work</li>
                                <li>Benefits</li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="contact-info">
                    <h2>Contact Us</h2>
                    <ul class="list-unstyled">
                        <li>59847 Levo Road Red Fort.U.S</li>
                        <li>Phone:012-123456</li>
                        <li>Email:<a href="mailto:mmsss875@gmail.com"> mmsss875@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Footer-->

<!--Start Copy right-->
<div class="copy-right">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm text-center text-sm-start">
                Copy right 2017 Elitcorp &copy; All Right Reserved
            </div>
            <div class="col-sm text-center text-sm-end">
                <ul class="list-unstyled">
                    <li>
                        <a href="http://tweetytube.epizy.com/"><i class="fa fa-facebook"></i> </a>
                    </li>
                    <li>
                        <a href="http://tweetytube.epizy.com/"><i class="fa fa-twitter"></i> </a>
                    </li>
                    <li>
                        <a href="http://tweetytube.epizy.com/"><i class="fa fa-youtube"></i> </a>
                    </li>
                    <li>
                        <a href="http://tweetytube.epizy.com/"><i class="fa fa-google-plus"></i> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Copy right-->

<script type="text/javascript">
    $(document).ready(function ()){
        $("#searchbar").onkeyup(function ())
        {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {query: query},
                    success: function (data) {
                        $('#countryList').html(data);
                    }
                });

            } else {
                $('#countryList').html('');

            }

        });
            $(document).on('click','.list-group-item',function ()){
                $('#searchbar').val($.trim($(this).text()));
                $('#countryList').fadeOut();
        });

        });
    }
</script>