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

    /**
     * @throws \Exception
     */
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
            $role = isset($_POST['role']) && $_POST['role'] === 'admin' ? 'admin' : 'user';

            if ($this->model->usernameExists($username)) {
                $_SESSION['error'] = "Ce nom d'utilisateur est déjà pris";
                header('Location: /login');
                exit;
            }

            if ($password === $confirm_password) {
                $this->model->registerUser($username, $password, $role);
            } else {
                $_SESSION['error'] = 'Passwords do not match';
            }
        }

        $content = __DIR__ . '/../view/login.php';
        include __DIR__ . '/../view/layout.php';
    }
}