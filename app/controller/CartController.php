<?php

namespace App\controller;
use App\model\ProductModel;


class CartController
{

    private ProductModel $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }
    public function index(): void
    {
        session_start();
        $cartProducts = [];
        $totalPrice = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $productData) {
                $product = $this->productModel->getProductById($productId);
                if ($product) {
                    $product['quantity'] = $productData['quantity'];
                    $cartProducts[] = $product;
                    $totalPrice += $product['product_price'] * $productData['quantity'];
                }
            }
        }
        $content = __DIR__ . '/../view/cart.php';
        include __DIR__ . '/../view/layout.php';
    }

}