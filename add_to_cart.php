<?php
  include_once("classes\cart.class.php");
  include_once("dbconn.php");
session_start();
  if($_POST["action"]=="remove"){

    $_SESSION["cart"]->removeFromCart($_POST["code"]);
  } else {

    $_SESSION["cart"]->addToCart($_POST["code"]);
  }

  $products = $_SESSION["cart"]->getProducts();
  $js_array = json_encode($products);
  echo $js_array ;
 ?>
