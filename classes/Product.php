<?php
class Product {
    public $id;
    public $name;
    public $price;

    public function __construct($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public static function getAllProducts() {
        $products = json_decode(file_get_contents('data/products.json'), true);
        $productObjects = [];
        foreach ($products as $product) {
            $productObjects[] = new self($product['id'], $product['name'], $product['price']);
        }
        return $productObjects;
    }

    public static function getProductById($id) {
        $products = self::getAllProducts();
        foreach ($products as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
        return null;
    }
}
?>
