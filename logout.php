<?php
session_start(); //Start the session
session_unset(); // Unset The Data
session_destroy(); // Destroy The Session
header('Location:index.php'); //Open the index page
exit(); //Close this php page