<?php

session_start();
$pageTitle = 'EcoExpress';
include 'selectLanguage.php';
include 'initmain.php';


if (isset($_POST['categoriesItems'])){
    if ($_GET['action'] == 'categories'){
            ?>

<!--Start Latest post-->
<div class="latest-post">
    <div class="container">
        <div class="row">
            <?php
            //print_r(getProducts()) ;
            foreach (getProducts() as $row) {
                $img = $row['Image'];
                $name = $row['Name'];
                $desc = $row['Description'];
                $price = $row['Price'];
                $rating = $row['Rating'];
                $itemid = $row['itemID'];
                $catId = $row['CatID'];
/*                echo $itemid;*/
                if ($_GET['id'] == $catId){
                    echo "<div class='text-center col-sm-4 col-md-3 col-lg-2'> <a href='item.php?itemid=$itemid' target='_blank' class='card' >";
                    echo "<form action='index.php' method='post'>";
                    /*echo '<div class="col-sm-4 col-md-3 col-lg-2">
                    <a href="item.php?item="  target="_blank" class="card">';*/
                    echo "<img class='card-img-top' src='uploads/$img' alt=''> <div class='card-body'>";
                    echo "<p>$name</p> <p>$desc</p> <h5><small><s class='text-secondary'>$10</s></small> $$price</h5> 
                              <button class='btn btn-warning my-3' type='submit' name='add'>Add to cart<i style='color: white' class='fas fa-shopping-cart'></i></button>
                              <input type='hidden' name='item_id' value='$itemid'>
                            </div> </a></form></div>";
                }
            }?>
        </div>
    </div>
</div>
<!--End Latest post-->
<?php


    }

}

?>