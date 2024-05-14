<?php

namespace App\controller;

use App\model\LoginModel;
use PDO;

class RegisterController
{
    private LoginModel $model;

    public function __construct(PDO $pdo)
    {
        $this->model = new LoginModel($pdo);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

            if ($password === $confirm_password) {
                $this->model->registerUser($username, $password);
            } else {
                echo 'Passwords do not match';
            }
        }

        $content = __DIR__ . '/../view/login.php';
        include __DIR__ . '/../view/layout.php';
    }
}