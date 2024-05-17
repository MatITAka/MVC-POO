<?php

namespace App\controller;

use App\model\ProductModel;
use PDOException;

class CheckoutController
{

    private ProductModel $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }
    public function index(): void
    {
        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            // Redirect to the cart page
            header('Location: /cart');
            exit();
        }

        $cart = $_SESSION['cart'] ?? [];
        $products = [];
        $total = 0;

        foreach ($cart as $id => $product) {
            $product = $this->productModel->getProductById($id);
            $product['quantity'] = $cart[$id]['quantity'];
            $products[] = $product;
            $total += $product['product_price'] * $product['quantity'];
        }
        $cartProducts = $products;
        $totalPrice = $total;

        $content = __DIR__ . '/../view/checkout.php';
        include __DIR__ . '/../view/layout.php';
    }

    public function validateOrder() : void {
        if (isset($_POST['submit'])) {
            $name = $_POST['firstName'] . ' ' . $_POST['lastName'];
            $location = $_POST['address'] . ' ' . $_POST['country'] . ' ' . $_POST['city'];
            $price = $_POST['price'];
            $email = $_POST['email'];
            $items = json_decode($_POST['items'], true);
            $date = date('Y-m-d H:i:s');

            try {
                $pdo = require __DIR__ . '/../model/dbconfig.php';
                $stmt = $pdo->prepare('INSERT INTO commande (order_name, order_location, order_price, order_date, order_email, order_items) VALUES (:name, :location, :price, :date, :email, :items)');
                $stmt->execute(['name' => $name, 'location' => $location, 'price' => $price, 'date' => $date, 'email' => $email, 'items' => serialize($items)]);

                $this->checkoutSuccess();
            } catch (PDOException $e) {
                error_log("Database error: " . $e->getMessage());
            }
        }
    }

    public function checkoutSuccess() :void {
        $content = __DIR__ . '/../view/checkoutSuccess.php';
        include __DIR__ . '/../view/layout.php';
    }

}