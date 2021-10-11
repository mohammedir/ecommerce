<?php
function lang($phrase)
{
    static $lang = array(
        /*Input all string in you site here*/
        'administrator' => 'Administrator',
        'welcome' => 'Welcome',
        'home' => 'Home',
        'categories' => 'Categories',
        'items' => 'Items',
        'members' => 'Members',
        'order' => 'orders',
        'logs' => 'Logs',
        'blog' => 'Blog',
    );
    return $lang[$phrase];
}