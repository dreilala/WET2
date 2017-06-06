<?php
  include_once("classes\cart.class.php");
  include_once("dbconn.php");
  if(!isset($cart)){
    $cart = new cart($dbconn);
  }
  echo $_POST["code"];
  $cart->setCart($_POST["code"],1);

  $products = $cart->getProducts();
  var_dump($products);
 ?>
