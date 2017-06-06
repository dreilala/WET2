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

?>
     <div class="container">

       <div class="row">

         <div class="col-md-9">

           <div class="row">
<?php
    while ($zeile = $ergebnis->fetch_object()) {
      //pro DB-Zeile wird neues User-Objekt erzeugt



?>




              <div class="col-sm-4 col-lg-4 col-md-4">
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
                      echo "<a href='#'>$zeile->Name</a>";
?>
                    </h4>
                  </div>
                  <div class="ratings">

                  </div>
                  <div class='m-b-10px'>

                  <input type="button" id="add_
                  <?php echo $zeile->Name; ?>
                  " value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add',' <?php echo $zeile->Name; ?>')"/>
                  <input type="button" id="added_<?php echo $zeile->Name; ?>" value="Added" class="btnAdded"  />

                  </div>
                </div>
              </div>




<?php

    }
?>
      </div>
    </div>

   </div>

 </div>

 <?php
    echo "</div>";
    echo "</div><br>";

  }


}
