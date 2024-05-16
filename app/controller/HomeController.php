<?php

namespace App\controller;

class HomeController
{
    public function index(): void
    {
        session_start();
        $content = __DIR__ . '/../view/home.php';
        include __DIR__ . '/../view/layout.php';
    }
}