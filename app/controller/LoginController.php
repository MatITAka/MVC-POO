<?php

namespace App\controller;

use App\model\LoginModel;
use Exception;
use JetBrains\PhpStorm\NoReturn;

class LoginController
{
    private LoginModel $model;

    public function __construct(LoginModel $model)
    {
        $this->model = $model;
    }

    public function index(): void
    {
        $content = __DIR__ . '/../view/login.php';
        include __DIR__ . '/../view/layout.php';
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            try {
                if ($this->model->verifyCredentials($username, $password)) {
                    $_SESSION['username'] = $username;

                    echo "Login successful!";
                    header('Location: /');
                } else {
                    $_SESSION['login_error'] = 'Invalid username or password';
                    header('Location: /login');
                }
                exit;
            } catch (Exception $e) {

                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    #[NoReturn] public function logout(): void
    {
        echo "You have been logged out.";
        session_destroy();

        header('Location: /');
        exit;
    }

    public function forgotPassword(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            if ($this->model->emailExists($email)) {
                $token = bin2hex(random_bytes(50));
                $this->model->storeToken($email, $token);

                $resetLink = "http://yourwebsite.com/reset-password?token=$token";
                mail($email, "Reset your password", "Click this link to reset your password: $resetLink");

                echo "An email has been sent to your email address with a link to reset your password.";
            } else {
                echo "This email address does not exist.";
            }
        } else {
            $content = __DIR__ . '/../view/forgot-password.php';
            include __DIR__ . '/../view/layout.php';
        }
    }
}