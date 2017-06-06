<?php

class cart{

  private $conn;
  private $products = array("index"=>"0");

  public function __construct($db){
    $this->conn = $db;
  }

  public function setCart($product,$menge){

    $products[$product]=$menge;

  }

  public function count(){

    $count = 0;
    foreach ($products as $key => $value){

      $count = $count + $value;

    }
    return $count;

  }

  public function getProducts(){
    return $products;
  }

}



 ?>
