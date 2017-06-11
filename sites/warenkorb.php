<div class='container'>
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

   <input type="text" class="centered" name="Gutscheincode" value="">
  <input type="submit" class="pull-right" name="submit" value="Bestellen">

</form>

</div>
