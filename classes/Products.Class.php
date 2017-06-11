<?php

class products {

  private $conn;

  public function __construct($db){
    $this->conn = $db;
  }
  public function addProduct($name, $description, $pathToPicture, $price){

    $stmt = $this->conn->prepare("INSERT INTO `products` (`Name`, `Description`, `pathtopicture`, `price`) VALUES (?,?,?,?)");
    $stmt->bind_param("sssd", $name, $description, $pathToPicture, $price);
    $stmt->execute();
    $stmt->close();
  }
  public function addImage($name) {

  }



  public function displayAll(){

    $query = "SELECT * FROM products";
    $ergebnis = $this->conn->query($query);
    if(!isset($cart)){
      $cart = new cart($this->conn);
    }
    $products = $cart->getProducts();

?>
     <div class="container" onload="cartRefresh();">

       <div class="row">
       <h1>Produkte</h1>

        
<?php
    while ($zeile = $ergebnis->fetch_object()) {
      //pro DB-Zeile wird neues User-Objekt erzeugt



?>




              <div class="col-xs-4">
                <div class="thumbnail">
<?php
                  echo "<img src='images/".$zeile->pathtopicture."' alt='' onerror=\"this.src='images/default.jpg'\">"
?>

                  <div class="caption">
<?php
                    echo "  <h4 class='pull-right'>$zeile->price</h4>";
?>

                    <h4>
<?php
                      echo "<span>$zeile->Name</span>";
?>
                    </h4>
                  </div>
                  <!--<div class="ratings">

                  </div>-->
                  <div>
                  
                  <input type="button" id="add_<?php echo $zeile->Name; ?>" value="+" class="btn btn-success" onClick = "cartAction('add',' <?php echo $zeile->Name; ?>')" />
                  <input type="button" id="remove_<?php echo $zeile->Name; ?>" value="–" class="btn btn-danger" onClick = "cartAction('remove',' <?php echo $zeile->Name; ?>')" />

                  <span class="pull-right">Anzahl: <span id="amount_<?php echo $zeile->Name; ?>">0</span></span>
                  </div>
                </div>
              </div>




<?php

    }
?>

   </div>

 </div>

 <?php
    echo "</div>";
    echo "</div><br>";

  }


}
