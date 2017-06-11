<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$products["sum"]=0;
foreach($_SESSION as $key=>$val){
  $sel=substr($key,0,5);
  if ($sel=="prod_"){

    $id = trim(substr($key,5))  ;

    $products[$id]=$val;
    $products["sum"]=$products["sum"]+$val;
  }
}
$js_array = json_encode($products);
$_SESSION["cartsum"]=$products["sum"];
echo $js_array ;
