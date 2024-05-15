<?php

namespace App\controller;

class OrderController
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            $content = __DIR__ . '/../view/order.php';
            include __DIR__ . '/../view/layout.php';
        } else {
            header('Location: /login');
        }

    }

    public function createOrder(){

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            $product = $_POST['product'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $total = $_POST['total'];
            $payment = $_POST['payment'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $pdo = require_once __DIR__ . '/../model/dbconfig.php';
            $stmt = $pdo->prepare('INSERT INTO orders (name, email, address, city, state, zip, product, quantity, price, total, payment, status, date, time) VALUES (:name, :email, :address, :city, :state, :zip, :product, :quantity, :price, :total, :payment, :status, :date, :time)');
            $stmt->execute(['name' => $name, 'email' => $email, 'address' => $address, 'city' => $city, 'state' => $state, 'zip' => $zip, 'product' => $product, 'quantity' => $quantity, 'price' => $price, 'total' => $total, 'payment' => $payment, 'status' => $status, 'date' => $date, 'time' => $time]);
            header('Location: /order');
        }
    }
}