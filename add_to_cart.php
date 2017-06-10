<?php

include_once "classes/Products.Class.php";
include_once "classes/cart.Class.php";
include_once "inc/dbconn.php";
session_start();
  if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = new cart($dbconn);
  }

  if($_POST["action"]=="remove"){

    $_SESSION["cart"]->removeFromCart($_POST["code"]);
  } else {

    $_SESSION["cart"]->addToCart($_POST["code"]);
  }
  $products = $_SESSION["cart"]->getProducts();
  $js_array = json_encode($products);
  $_SESSION["cartsum"]=$products["sum"];
  echo $js_array ;
 ?>
