<?php
session_start();
require 'classes/Cart.php';
require 'classes/Auth.php';

if (!Auth::isLoggedIn()) {
    header('Location: login.php');
    exit();
}

$cart = new Cart();
$totalAmount = $cart->getTotalAmount();

$cart->clearCart();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Checkout</h1>
    <p>Thank you for your purchase!</p>
    <p>Your total cost is: $<?php echo $totalAmount; ?></p>
    <a href="index.php">Go Back to Home</a>
</body>
</html>
