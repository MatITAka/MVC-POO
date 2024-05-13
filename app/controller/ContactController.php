<?php
// app/controller/ContactController.php

namespace App\controller;

class ContactController
{
    public function index()
    {
        $content = __DIR__ . '/../view/contact.php';
        include __DIR__ . '/../view/layout.php';
    }

    public function submitForm()
    {
     print_r($_POST);
    }
}