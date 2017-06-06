<?php
  include_once("classes\cart.class.php");
  include_once("dbconn.php");
  if(!isset($cart)){
    $cart = new cart($dbconn);
  }
  $cart->setCart($_POST["code"],1);

  $cart->getProducts();

 ?>
