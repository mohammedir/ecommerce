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

include $lang . 'english.php';//Text in the project
include  $tpl .'header.php'; //Css file initialize
//include  'C:/xampp/htdocs/ecommerce/admin/includes/templates/header.php'; //Css file initialize
if (!isset($noNavbar)){
    include $tpl . 'navbar.php';//Top menu navbar
    include $tpl . 'footer.php';//Script file initialize and Bottom content
}

?>
