
 <div class="container">

   <div class="row">

     <div class="col-md-9">

       <div class="row">

          <div class="col-sm-2 col-lg-2 col-md-2">
<?php
              echo "<img src='images/".$zeile->pathtopicture."' alt='' onerror=\"this.src='images/default.jpg'\" width='100px'>"
?>
          </div>

              <div class="col-sm-3 col-lg-3 col-md-3">
<?php
                echo "  <h4 class='pull-right'>$zeile->price</h4>";
?>

                <h4>
<?php
                  echo "<a href='#'>$zeile->Name</a>";
?>
                </h4>
              </div>
              <div class="col-sm-3 col-lg-3 col-md-3">

              
              <div class="pull-right" id="amount_<?php echo $zeile->Name; ?>" >
                <?php echo $val; ?>
              </div>
              </div>
              <div id="price_<?php echo $zeile->Name; ?>" class="col-sm-4 col-lg-4 col-md-4">
                <?php echo $val*$zeile->price; ?>
              </div>

          </div>

  </div>
</div>

</div>

</div>

<?php
echo "</div>";
echo "</div><br>";
