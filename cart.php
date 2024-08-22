<?php
session_start();
require 'classes/Product.php';
require 'classes/Cart.php';
require 'classes/Auth.php';

if (!Auth::isLoggedIn()) {
    header('Location: login.php');
    exit();
}

$cart = new Cart();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cart->addProduct($_POST['productId']);
}

$cartProducts = $cart->getCartProducts();
$totalAmount = $cart->getTotalAmount();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Shopping Cart</h1>
    <ul>
        <?php foreach ($cartProducts as $item): ?>
            <li>
                <?php echo $item['product']->name . ' - $' . $item['product']->price . ' x ' . $item['quantity']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <p>Total: $<?php echo $totalAmount; ?></p>
    <form method="POST" action="checkout.php">
        <button type="submit">Checkout</button>
    </form>
    <a href="index.php">Continue Shopping</a>
</body>
</html>
