<?php
//This page it's have all functions you need to use it in all place in the project
/*@getTitle this method can be set title for all tap page in the project */
function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else
        echo "Page";
}

/*Home or any page Redirect Function
*Parameters
 * -1 errorMessage --> error text
 * -2 seconds --> time to show this error before redirect to home page
*/
function redirect2Page($pageName, $pagePhp, $errorMessage, $seconds = 3)
{
    echo "<div class='alert alert-danger'>$errorMessage</div>";
    echo "<div class='alert alert-info'>We Will Be Redirect you to $pageName page After $seconds Seconds.</div>";
    header("refresh:$seconds;url=$pagePhp");
    exit();
}

function printMessage($type, $message, $seconds = 5)
{
    echo "<div class='alert $type'>$message</div>";
    //header("refresh:$seconds");
    exit();
}


/*
 * Function to check Item into database
 */
function checkItem($select, $from, $value)
{
    global $conn;
    $stmt = $conn->prepare("SELECT $select FROM $from WHERE $select =?");
    $stmt->execute(array($value));
    return $stmt->rowCount();
}

/*
 * Get Count number of rows in db
*/
function getRowsCount($item, $table)
{
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT($item) FROM $table");
    $stmt->execute();
    return $stmt->fetchColumn();
}

/*
 * */
function getRowsCountWhere($item, $table, $select, $value)
{
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT($item) FROM $table WHERE $select = ?");
    $stmt->execute(array($value));
    return $stmt->fetchColumn();
}

/*
 * Get Latest Item*/
function getData($select, $from, $order, $byDesAsc, $limit)
{
    global $conn;
    $stmt = $conn->prepare("SELECT $select FROM $from ORDER BY $order $byDesAsc LIMIT $limit");
    $stmt->execute();
    return $stmt->fetchAll();
}







