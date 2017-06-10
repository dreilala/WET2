<?php


$query = "SELECT $product FROM products";
$ergebnis = $this->conn->query($query);

$zeile = $ergebnis.fetch_object();

?>
 <div class="container">

   <div class="row">

     <div class="col-md-9">

       <div class="row">

          <div class="col-sm-4 col-lg-4 col-md-4">
<?php
              echo "<img src='images/".$zeile->pathtopicture."' alt='' onerror=\"this.src='images/default.jpg'\">"
?>
          </div>

              <div class="col-sm-4 col-lg-4 col-md-4">
<?php
                echo "  <h4 class='pull-right'>$zeile->price</h4>";
?>

                <h4>
<?php
                  echo "<a href='#'>$zeile->Name</a>";
?>
                </h4>
              </div>
              <div class="col-sm-4 col-lg-4 col-md-4">

              <input type="button" id="add_<?php echo $zeile->Name; ?>" value="+" class="btnAddAction cart-action" onClick = "cartAction('add',' <?php echo $zeile->Name; ?>')" />
              <input type="button" id="remove_<?php echo $zeile->Name; ?>" value="-" class="btnAddAction cart-action" onClick = "cartAction('remove',' <?php echo $zeile->Name; ?>')" />

              <div class='pull-right' id="amount_<?php echo $zeile->Name; ?>" >
                0
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
