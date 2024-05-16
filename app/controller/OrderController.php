<?php

namespace App\controller;

use PDOException;
class OrderController
{
    public function index(): void
    {
      ;
        if (isset($_SESSION['username'])) {
            ob_start();
            $content = __DIR__ . '/../view/order.php';
            include __DIR__ . '/../view/layout.php';
            ob_end_flush();
        } else {
            header('Location: /login');
        }

    }
    public function createOrder(): void
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['firstName'] . ' ' . $_POST['lastName'];
            $location = $_POST['address'] . ' ' . $_POST['country'] . ' ' . $_POST['city'];
            $price = $_POST['price'];
            $date = date('Y-m-d H:i:s');

            try {
                $pdo = require __DIR__ . '/../model/dbconfig.php';
                $stmt = $pdo->prepare('INSERT INTO commande (order_name, order_location, order_price, order_date) VALUES (:name, :location, :price, :date)');
                $stmt->execute(['name' => $name, 'location' => $location, 'price' => $price, 'date' => $date]);

                header('Location:/order');
            } catch (PDOException $e) {
                error_log("Database error: " . $e->getMessage());

            }
        }
    }
}