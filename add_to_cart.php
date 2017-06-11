<?php

include_once "classes/Products.Class.php";
include_once "classes/cart.Class.php";
include_once "inc/dbconn.php";
session_start();


  if($_POST["action"]=="remove"){
    $id="prod_".$_POST["code"];
    if(isset($_SESSION[$id])){
      if($_SESSION[$id]>0){
        $_SESSION[$id]=$_SESSION[$id]-1;
      }
    } else {
      $_SESSION[$id] = 0;
    }
  } else {
    $id="prod_".$_POST["code"];
    if(isset($_SESSION[$id])){
      $_SESSION[$id]=$_SESSION[$id]+1;
    } else {
      $_SESSION[$id]=1;
    }
  }
  include("load_Cart.php");

 ?>
