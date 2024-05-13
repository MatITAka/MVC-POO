<?php

namespace App\controller;

class AboutController
{
    public function index()
    {
        $content = __DIR__ . '/../view/about.php';
        include __DIR__ . '/../view/layout.php';
    }
}