<?php

namespace App\controller;

class HomeController
{
    public function index()
    {
        session_start();
        $content = __DIR__ . '/../view/home.php';
        include __DIR__ . '/../view/layout.php';
    }
}