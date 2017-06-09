<?php

include "inc/navigation.php";
include "inc/dbconn.php";

include "classes/Products.Class.php";
include "classes/cart.Class.php";

session_start();
ob_start();

if (!empty($_GET['page'])) {

    $file = "sites/" . $_GET['page'] . ".php";
    if (file_exists($file)) {
        include($file);
        // if $page has a value, and the file exists, include it
    } else {
        include("sites/404.php");
        // if $page has a value, but the file doesn't exist, include 404.php
    }
}
