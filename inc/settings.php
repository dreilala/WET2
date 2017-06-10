<?php



if (!empty($_GET['page'])) {

    $file = "sites/" . $_GET['page'] . ".php";
    if (file_exists($file)) {
        $adminroutes  = array("voucher", "Customerinfo", "Listproducts");
        if ((!isset($_SESSION["userid"]) || $_SESSION["userid"] != 1) && in_array($_GET['page'], $adminroutes)) {
            include("sites/notallowed.php");
        } else {
            include($file);
        }

        // if $page has a value, and the file exists, include it
    } else {
        include("sites/404.php");
        // if $page has a value, but the file doesn't exist, include 404.php
    }
} else {
    include("sites/home.php");
}
