<?php

namespace App\controller;

use App\model\LoginModel;
use Exception;

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            try {
                if ($this->model->verifyCredentials($username, $password)) {
                    // Store the username in a session variable
                    $_SESSION['username'] = $username;

                    echo "Login successful!";
                    header('Location: /');
                    exit;
                } else {
                    throw new Exception('Invalid username or password');
                }
            } catch (Exception $e) {
                // Display the error message
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    public function logout(){
        session_destroy();
        header('Location: /');
        exit;
    }

    public function forgotPassword()
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