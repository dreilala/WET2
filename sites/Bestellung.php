<div class='container'>
  <h1>Vielen Dank für Ihre Bestellung</h1>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

foreach($_SESSION as $key=>$val){

  $sel=substr($key,0,5);
  if ($sel=="prod_" and $val > 0){
    if (!isset($order)){
      $order=new Order($dbconn,$_SESSION["userid"]);
      if($_POST["Gutscheincode"]){
        $query = "SELECT * FROM voucher where code = '".$_POST["Gutscheincode"]."'";
        if($ergebnis = $dbconn->query($query)){
          $zeile = $ergebnis->fetch_object();
          if ($zeile != null) {
            $order->addProduct("Gutschein",-1*$zeile->value,"1");
          }

                
        }

      }
    }
    $id = trim(substr($key,5))  ;
    if ($id!="sum" ){

      $query = "SELECT * FROM products where Name = '".$id."'";
      $ergebnis = $dbconn->query($query);

       echo "<div class='row'>";
         if($zeile = $ergebnis->fetch_object()){
           include("cartDispNoInput.php");
           $order->addProduct($zeile->Name,$zeile->price,$val);
           $_SESSION[$key]=0;
         }

       echo "</div>";


    }

  }
}

 ?>


</div>
