<?php
/*
 * Categories = [ Manage | Edit | Update | Add | Insert | Delete | Stats ]
*/
$page = isset($_GET['page']) ?$_GET['page']:'Manage' ; //If the get page is exist get the page else get main page "Manage"

if ($page == 'Manage'){
    echo 'Welcome in Manage page';
}elseif ($page == 'Edit'){
    echo 'Welcome in Edit page';
}elseif ($page == 'Update'){
    echo 'Welcome in Update page';
}else{
    echo 'error not found this page';
}