<?php

require_once 'Product.php';
class Cart {
    public function addProduct($productId) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 0;
        }
        $_SESSION['cart'][$productId]++;
    }

    public function getCartProducts() {
        $cartProducts = [];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                $product = Product::getProductById($productId);
                if ($product) {
                    $cartProducts[] = [
                        'product' => $product,
                        'quantity' => $quantity
                    ];
                }
            }
        }
        return $cartProducts;
    }

    public function clearCart() {
        unset($_SESSION['cart']);
    }

    public function getTotalAmount() {
        $total = 0;
        foreach ($this->getCartProducts() as $item) {
            $total += $item['product']->price * $item['quantity'];
        }
        return $total;
    }
}
?>
