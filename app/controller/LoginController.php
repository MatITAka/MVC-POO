<?php

namespace App\controller;

use App\model\LoginModel;

class LoginController
{
    private LoginModel $model;

    public function __construct(LoginModel $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $content = __DIR__ . '/../view/login.php';
        include __DIR__ . '/../view/layout.php';
    }

    public function login()
    {
        $email = $_POST['username'];
        $password = $_POST['password'];

        if ($this->model->verifyCredentials($email, $password)) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
            header('Location: /');
        } else {
            echo 'Invalid credentials';
            header('Location: /login');
        }
        exit;
    }
}