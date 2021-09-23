<?php

/*Page Title*/
function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else
        echo "Page";
}

function getAds(){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM ads");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getProducts()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM items");
    $stmt->execute();
    return $stmt->fetchAll();
}
function getProductsLimit($limit)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM items LIMIT $limit");
    $stmt->execute();
    return $stmt->fetchAll();
}


function getCategories()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM categoris");
    $stmt->execute();
    return $stmt->fetchAll();
}

function wrap_tag($argument){
    return '<b>' .$argument. '</b>';

}