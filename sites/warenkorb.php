<?php

foreach($_SESSION as $key=>$val){
  echo "<div class='container'>";
  $sel=substr($key,0,5);
  if ($sel=="prod_"){
    echo "<div class='row'>".$key."</div>";

    $id = substr($key,5);
    if ($id!="sum"){
      $query = "SELECT ".$id." FROM products";
      echo $query;
      $ergebnis = $dbconn->query($query);
      $zeile = $ergebnis->fetch_object();
       ?>
       <div class="row">
         produkt
  substr($key,0,5)="prod_"
       </div>
       <?php
    }

  }
  echo "</div>";
}
