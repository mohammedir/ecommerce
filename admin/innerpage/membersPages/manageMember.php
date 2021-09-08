<?php
/*Feach members from db*/
$stmt = $conn->prepare("SELECT * FROM users WHERE GroupID != 1");
$stmt->execute();
$rows = $stmt->fetchAll(); ?>
    <h1>Manage Members</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="main-table table table-bordered text-center">
                <tr>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Full Name</td>
                    <td>Register Date</td>
                    <td>Control</td>
                </tr>
                <?php
                foreach ($rows as $row) {
                    echo "<tr class='row-tr' >";
                    echo "<td>" . $row['UserID'] . "</td>";
                    echo "<td>" . $row['Username'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['FullName'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td> <a href='members.php?page=Edit&userid="
                        . $row['UserID'] . "' class='control-button btn btn-success'>Edit</a> <a href='members.php?page=Delete&userid="
                        . $row['UserID'] . "' class='control-button btn btn-danger confirm'>Delete</a>";
                    if ($row['RegStatus'] == 0){
                        echo "<a href='members.php?page=Activate&userid="
                            . $row['UserID'] . "' class='control-button btn btn-info'>Activate</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <a href="members.php?page=Add" class="btn btn-primary"><i class="fa fa-pulse"></i><strong>+</strong> Add New
            Member</a>
    </div>
<?php
