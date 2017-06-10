
  <?php

if(!isset($products)){

  $products = new products($dbconn);
}
$products->displayAll();

?>
