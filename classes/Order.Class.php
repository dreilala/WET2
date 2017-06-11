
<?php

class Order {

  private $conn;
  private $rnum;

  public function __construct($db,$kund){
    $this->conn = $db;
    $stmt = $this->conn->prepare("INSERT INTO `Bestellkopf` (KUND) VALUES (?)");
    $stmt->bind_param("s", $kund);
    $stmt->execute();


    $this->rnum = $stmt->insert_id;
    $stmt->close();
    echo "Nummer".$this->rnum;

  }

public function addProduct($prod,$price,$meng){


  $stmt = $this->conn->prepare("INSERT INTO `bestellung` (`RNUM`, `PROD`, `Price`, `MENG`) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $this->rnum, $prod, $price, $meng);
  $stmt->execute();
  $stmt->close();
}
}
