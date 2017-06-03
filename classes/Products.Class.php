<?php

class products {

  private $conn;

  public function __construct($db){
    $this->conn = $db;
  }


public function displayAll(){



  $query = "SELECT * FROM products";
  $ergebnis = $this->conn->query($query);
  echo "<div class='container'>";
  echo "<div class='row'>";
  while ($zeile = $ergebnis->fetch_object()) {
    //pro DB-Zeile wird neues User-Objekt erzeugt


    echo "<div class='col-sm-4'>";
    echo "  <div class='panel panel-primary'>";
    echo "<div class='panel-body'><img src='https://placehold.it/150x80?text=IMAGE' class='img-responsive' style='width:100%' alt='Image'></div>";
    echo "<div class='panel-footer'>$zeile->price</div>";
    echo "</div>";
    echo "  </div>";


  }

  echo "</div>";
echo "</div><br>";

}

public function addProduct($name, $description, $pathToPicture, $price){

 $stmt = $this->conn->prepare("INSERT INTO `products` (`Name`, `Description`, `pathtopicture`, `price`) VALUES ('?', '?', '?', '?')");
 $stmt->bind_param("sssd", $name, $description, $pathToPicture, $price);
 $stmt->execute();
 $stmt->close();
 }
 }
