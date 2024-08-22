<?php
session_start();
require 'classes/Product.php';
require 'classes/Cart.php';
require 'classes/Auth.php';

if (!Auth::isLoggedIn()) {
    header('Location: login.php');
    exit();
}

$products = Product::getAllProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Products</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product->name . ' - $' . $product->price; ?>
                <form method="POST" action="cart.php">
                    <input type="hidden" name="productId" value="<?php echo $product->id; ?>">
                    <button type="submit">Add to Cart</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="cart.php">View Cart</a>
    <a href="logout.php">Logout</a>
</body>
</html>
