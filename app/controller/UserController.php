<?php

namespace App\controller;

class UserController
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            $content = __DIR__ . '/../view/dashboard.php';
            include __DIR__ . '/../view/layout.php';
        } else {
            header('Location: /login');
        }

    }
}