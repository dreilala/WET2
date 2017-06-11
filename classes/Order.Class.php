
<?php

class Order {

  private $conn;

  public function __construct($db){
    $this->conn = $db;

  }

public function addProduct($kund,$prod,$price,$meng){
  $stmt = $this->conn->prepare("INSERT INTO `Bestellkopf` (KUND) VALUES (?)");
  $stmt->bind_param("s", $kund);
  $stmt->execute();
  $stmt->close();

  $query = "SELECT * FROM Bestellkopf where KUND = '".$kund."'";
  $ergebnis = $this->conn->query($query);
  $rnum = $ergebnis->fetch_object()->RNUM;

  $stmt = $this->conn->prepare("INSERT INTO `bestellung` (`RNUM`, `PROD`, `Price`, `MENG`) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $rnum, $prod, $price, $meng);
  $stmt->execute();
  $stmt->close();
}
}
