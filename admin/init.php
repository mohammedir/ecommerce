<!--This file for all path folders in my project-->
<?php
include 'connect.php';

$lang = 'includes/languages/';
$tpl = 'includes/templates/';
$func = 'includes/functions/';
$lib = 'includes/libraries/';
$css = 'layout/css/';
$js = 'layout/js/';
$img = 'layout/images/';
$foaw = 'ttps://kit.fontawesome.com/deeee70e6c.js';
//Inner pages path
$inmempg = 'innerpage/membersPages/';
$incatpg = 'innerpage/categoriesPages/';


include $func . 'functions.php';//All functions you need in the project
include $lang . 'english.php';//All Text in the project
include $tpl . 'header.php'; //Css file initialize and titles pages

//Check if the page was included this file does need show top nave bar and footer,
// so check if it's had a $noNavbar variable
if (!isset($noNavbar)) {
    include $tpl . 'navbar.php';//Top menu navbar
    include $tpl . 'footer.php';//Script file initialize and Bottom content
    //...add here...
    //... add any things you need in the includer page
}

?>
