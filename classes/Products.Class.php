<?php

class products {

  private $conn;

  public function __construct($db){
    $this->conn = $db;
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
                  echo "<img src='images/".$zeile->pathtopicture." alt=''>"
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

                  <a href='add_to_cart.php?id=1&page={1}' class='btn btn-primary w-100-pct'>Add to Cart</a>

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

  public function addProduct($name, $description, $pathToPicture, $price){

    $stmt = $this->conn->prepare("INSERT INTO `products` (`Name`, `Description`, `pathtopicture`, `price`) VALUES (?,?,?,?)");
    $stmt->bind_param("sssd", $name, $description, $pathToPicture, $price);
    $stmt->execute();
    $stmt->close();
  }
}
