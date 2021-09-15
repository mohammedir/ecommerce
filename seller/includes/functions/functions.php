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