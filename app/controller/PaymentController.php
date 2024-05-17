<?php

namespace App\controller;

use App\model\ProductModel;
use PDOException;

class PaymentController
{
    private ProductModel $productModel;

    public function __construct(ProductModel $productModel) {
        $this->productModel = $productModel;
    }

    public function index() :void {


        $cart = $_SESSION['cart'] ?? [];
        $products = [];
        $total = 0;


        if (!empty($cart)) {
            foreach ($cart as $id => $product) {
                $product = $this->productModel->getProductById($id);
                $product['quantity'] = $cart[$id]['quantity'];
                $products[] = $product;
                $total += $product['product_price'] * $product['quantity'];
            }
        }

        $totalPrice = $total;


        $content = __DIR__ . '/../view/payment.php';
        include __DIR__ . '/../view/layout.php';
    }

    public function payRequest() :void {

        if (isset($_POST['submit'])) {

            $personName = $_POST['personName'];
            $cardNumber = $_POST['cardNumber'];
            $expiry = $_POST['expiry'];
            $cvv = $_POST['cvv'];

            try {
                $pdo = require __DIR__ . '/../model/dbconfig.php';
                $stmt = $pdo->prepare('INSERT INTO payment (payment_name, payment_card, payment_expiry, payment_CVC) VALUES (:personName, :cardNumber, :expiry, :cvv)');
                $stmt->execute(['personName' => $personName, 'cardNumber' => $cardNumber, 'expiry' => $expiry, 'cvv' => $cvv]);
                unset ($_SESSION['cart']);
                $this->paymentSuccess();
            }

            catch (PDOException $e) {
                error_log("Database error: " . $e->getMessage());
            }

        }
    }

    public function paymentSuccess() :void {
        $content = __DIR__ . '/../view/paymentSuccess.php';
        include __DIR__ . '/../view/layout.php';
    }
}