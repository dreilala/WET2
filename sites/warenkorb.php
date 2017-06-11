<div class='container'>
<h1>Warenkorb</h1>
<form method="post" action="index.php?page=Bestellung">
<?php

foreach($_SESSION as $key=>$val){

  $sel=substr($key,0,5);
  if ($sel=="prod_"){

    $id = trim(substr($key,5))  ;
    if ($id!="sum" and $val>0){

      $query = "SELECT * FROM products where Name = '".$id."'";
      $ergebnis = $dbconn->query($query);

       echo "<div class='row'>";
         if($zeile = $ergebnis->fetch_object()){
           include("cartDisp.php");
         }
       echo "</div>";
    }

  }


}
 ?>
  
  <div class='form-group'>
      <label>Gutscheincode</label>
      <input type="text" class="form-control" name="Gutscheincode" value="">
  </div>
   
  <input type="submit" class="btn btn-primary pull-right" name="submit" value="Bestellen">

</form>

</div>
