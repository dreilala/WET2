<?php

session_start();
include "inc/dbconn.php";

$Name = $_GET['name'];


$sql = "delete from products where Name = '$Name'";
$result = $dbconn->query($sql);

if ($result == true) {
    header("Location: index.php?page=ListProducts");
    exit;
}
