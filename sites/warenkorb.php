<?php


if(!isset($_SESSION["cart"])){
  $_SESSION["cart"] = new cart($dbconn);
}

$_SESSION["cart"].displayCart();
