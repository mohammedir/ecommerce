<?php
/*Feach members from db*/
$stmt = $conn->prepare("SELECT * FROM orders");
$stmt->execute();
$rows = $stmt->fetchAll(); ?>
    <h1>Manage Order</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="main-table table table-bordered text-center">
                <tr>
                    <td>Order ID</td>
                    <td>Username</td>
                    <td>Product_id</td>
                    <td>Quantity</td>
                    <td>trx_id</td>
                    <td>p_status</td>
                </tr>
                <?php
                foreach ($rows as $row) {
                    echo "<tr class='row-tr' >";
                    echo "<td>" . $row['order_id'] . "</td>";
                    echo "<td>" . $row['user_name'] . "</td>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['qty'] . "</td>";
                    echo "<td>" . $row['p_status'] . "</td>";
                   /* echo "<td> <a href='members.php?page=Edit&userid="
                        . $row['UserID'] . "' class='control-button btn btn-success'>Edit</a> <a href='members.php?page=Delete&userid="
                        . $row['UserID'] . "' class='control-button btn btn-danger confirm'>Delete</a>";
                    if ($row['RegStatus'] == 0){
                        echo "<a href='members.php?page=Activate&userid="
                            . $row['UserID'] . "' class='control-button btn btn-info'>Activate</a>";
                    }
                    echo "</td>";*/
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
      
    </div>
<?php
