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
            foreach ($_SESSION['cart'] as $productId) {
                $product = $this->productModel->getProductById($productId);
                if ($product) {
                    $cartProducts[] = $product;
                    $totalPrice += $product['product_price'];
                }
            }
        }
        $content = __DIR__ . '/../view/cart.php';
        include __DIR__ . '/../view/layout.php';
    }

}