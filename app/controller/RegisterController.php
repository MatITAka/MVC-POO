<?php

namespace App\controller;

class RegisterController
{
    public function index()
    {
        $content = __DIR__ . '/../view/register.php';
        include __DIR__ . '/../view/layout.php';
    }
}