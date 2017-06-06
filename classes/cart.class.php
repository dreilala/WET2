<?php

class cart{

  private $conn;
  private $products = array("sum"=>"0");

  public function __construct($db){
    $this->conn = $db;
  }

  public function setSum(){

    $count = 0;
    foreach ($this->products as $key => $value){

      $sum = 0;
      if($key<>"sum"){

        $count = $count + $value;
      }

    }
    $this->products["sum"]=$count;

  }

  public function setCart($product,$menge){
    $this->products[$product]=$menge;
    $this->setSum();

  }


  public function countProduct($name){

    return $this->products[$name];

  }
  public function getProducts(){
    return $this->products;
  }

}



 ?>
