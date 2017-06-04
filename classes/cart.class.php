<?php

class cart{

  private $conn;
  private $products;

  public function __construct($db){
    $this->conn = $db;
  }

  public function addToCart($product){



  }

  public function count(){


    foreach ($products as $key => $value){

      echo $key;
      echo $value;

    }


  }

}



 ?>
