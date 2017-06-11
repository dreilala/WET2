<div class='container'>
  <h1>Vielen Dank für Ihre Bestellung</h1>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
foreach($_SESSION as $key=>$val){

  $sel=substr($key,0,5);
  if ($sel=="prod_"){

    $id = trim(substr($key,5))  ;
    if ($id!="sum" and $val>0){

      $query = "SELECT * FROM products where Name = '".$id."'";
      $ergebnis = $dbconn->query($query);
      $order=new Order($dbconn);
       echo "<div class='row'>";
         if($zeile = $ergebnis->fetch_object()){
           include("cartDispNoInput.php");
           $order->addProduct($_SESSION["userid"],$zeile->Name,$zeile->price,$val);
           $_SESSION[$key]=0;
         }
       echo "</div>";


    }

  }


}

 ?>


</div>
