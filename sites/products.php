
  <?php


$products = new products($dbconn);
$products->displayAll();
$products->addProduct("4","4","4.png","4");

?>
