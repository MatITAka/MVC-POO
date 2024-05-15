<?php

namespace App\controller;
use PDOException;

class UserController
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            $orders = $this->getOrders();
            $content = __DIR__ . '/../view/dashboard.php';
            include __DIR__ . '/../view/layout.php';
        } else {
            header('Location: /login');
        }

    }

    public function getOrders()
    {
        try {
            $pdo = require __DIR__ . '/../model/dbconfig.php';
            $stmt = $pdo->prepare('SELECT * FROM commande');
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());

        }
    }
}