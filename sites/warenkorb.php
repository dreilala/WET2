<?php

foreach($_SESSION as $key=>$val){
  echo "<div class='container'>";
  $sel=substr($key,0,5);
  if ($sel=="prod_"){

    $id = trim(substr($key,5))  ;
    if ($id!="sum"){

      $query = "SELECT * FROM products where Name = '".$id."'";
      $ergebnis = $dbconn->query($query);

       echo "<div class='row'>";
         if($zeile = $ergebnis->fetch_object()){
           include("cartDisp.php");
         }
       echo "</div>";
    }

  }
  echo "</div>";
}
