<?php

session_start();
include 'selectLanguage.php';
include 'initmain.php';
?>
<div class="wrapper">

    <div class="content-wrapper">
        <div class="container">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-9">
                        <?php

                        if (isset($_POST['keyword'])) {
                            $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM items WHERE Name LIKE :keyword");
                            $stmt->execute(['keyword' => '%' . $_POST['keyword'] . '%']);
                            $row = $stmt->fetch();
                            $numKey = $_POST['keyword'];
                            if ($row['numrows'] < 1 || $numKey == "") {
                                echo '<h1 class="page-header">No results found for <i>' . $_POST['keyword'] . '</i></h1>';
                            } else {
                                echo '<h1 class="page-header">Search results for <i>' . $_POST['keyword'] . '</i></h1>';
                                try {
                                    $inc = 3;
                                    $stmt = $conn->prepare("SELECT * FROM items WHERE Name LIKE :keyword");
                                    $stmt->execute(['keyword' => '%' . $_POST['keyword'] . '%']); ?>
                                    <div class="container">
                                        <div class="row"><?php
                                            foreach ($stmt as $row) {
                                                $highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['Name']);
                                                $img = $row['Image'];
                                                $name = $row['Name'];
                                                $desc = $row['Description'];
                                                $price = $row['Price'];
                                                $rating = $row['Rating'];
                                                $itemid = $row['itemID'];
                                                $cartmemberID = $row['MemberID'];
                                                /*                echo $itemid;*/
                                                echo "<div class='text-center col-sm-4 col-md-3 col-lg-2'> <a href='item.php?itemid=$itemid'  class='card' >";
                                                echo "<form  method='post'>";
                                                /*echo '<div class="col-sm-4 col-md-3 col-lg-2">
                                                <a href="item.php?item="  target="_blank" class="card">';*/
                                                echo "<img class='card-img-top' src='uploads/$img' alt=''> <div class='card-body'>";
                                                echo "<p>$name</p> <p>$desc</p> <h5><small><s class='text-secondary'>$10</s></small> $$price</h5> 
                                      <button class='btn btn-warning my-3 add_cart' type='submit' name='add' pid='$itemid' id='addcart'>Add to cart<i style='color: white' class='fas fa-shopping-cart'></i></button>
                                      <input type='hidden' name='item_id' value='$itemid' pid='$itemid'>
                                      <input type='hidden' name='item_image' value='$img' id='img'>
                                      <input type='hidden' name='item_name' value='$name' id='namecart'>
                                      <input type='hidden' name='item_price' value='$price' id='pricecart'>
                                      <input type='hidden' name='cartmemberID' value='$cartmemberID' id='cartmemberID'>
                                    </div> </a></form></div>";
                                            } ?>
                                        </div>
                                    </div>
                                    <?php

                                } catch (PDOException $e) {
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }


                            }
                        }else
                                echo "the search text is empty"
                        ?>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>

