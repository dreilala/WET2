
<div class="container">
  <div class="row">
    <div class="col-sm-2">
      <?php
      
      echo "<img src='images/".$zeile->pathtopicture."' alt='' onerror=\"this.src='images/default.jpg'\" width='100px'>"
      ?>
    </div>
    <div class="col-sm-3">
      <?php
      echo "  <h4 class='pull-right'>$zeile->price</h4>";
      ?>

      <h4>
        <?php
        echo $zeile->Name;
        ?>
      </h4>
    </div>

    <div class="col-sm-3">

    <input type="button" id="add_<?php echo $zeile->Name; ?>" value="+" class="btn btn-success" onclick="cartAction('add','<?php echo $zeile->Name; ?>', <?php echo $zeile->price; ?>);"  />
    <input type="button" id="remove_<?php echo $zeile->Name; ?>" value="–" class="btn btn-danger" onclick="cartAction('remove','<?php echo $zeile->Name; ?>', <?php echo $zeile->price; ?>);" />

      <div class="pull-right" id="amount_<?php echo $zeile->Name; ?>" >
        <?php echo $val; ?>
      </div>
    </div>
    <div id="price_<?php echo $zeile->Name; ?>" class="col-sm-4">
      <?php echo $val*$zeile->price; ?>
    </div>

  </div>

</div>
