<?php
  include_once("classes\cart.class.php");
  include_once("dbconn.php");
session_start();
  $_SESSION["cart"]->setCart($_POST["code"],1);

  $products = $_SESSION["cart"]->getProducts();
  $js_array = json_encode($products);
  echo $js_array ;
 ?>
