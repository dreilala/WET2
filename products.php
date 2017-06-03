<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Products</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <?php
  include("dbconn.php");
  include("classes\Products.Class.php");
  ?>

<?php         // creating box



$products = new products($dbconn);
$products->displayAll();
$products->addProduct("4","4","4.png","4");
echo "<div class='col-md-4 m-b-20px'>";

// product id for javascript access
echo "<div class='product-id display-none'>ID</div>";

echo "<a href='product.php?id=Id' class='product-link'>";
// select and show first product image
//                $product_image->product_id=$id;
/*            $stmt_product_image=$product_image->readFirst();

while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
echo "<div class='m-b-10px'>";
echo "<img src='uploads/images/{$row_product_image['name']}' class='w-100-pct' />";
echo "</div>";
} */

// product name
echo "<div class='product-name m-b-10px'>NAME</div>";
echo "</a>";

// product price and category name
echo "<div class='m-b-10px'>";
echo "&#36;" . number_format(122, 2, '.', ',');
echo "</div>";

// add to cart button
echo "<div class='m-b-10px'>";
// cart item settings
//                $cart_item->user_id=1; // we default to a user with ID "1" for now
//                $cart_item->product_id=1;

// if product was already added in the cart
//                    if($cart_item->exists()){
//                        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
//                            echo "Update Cart";
//                        echo "</a>";
//                    }else{
echo "<a href='add_to_cart.php?id=1&page={1}' class='btn btn-primary w-100-pct'>Add to Cart</a>";
//                    }
echo "</div>";



echo "</div>";
//    }
?>
</body>
</html>
