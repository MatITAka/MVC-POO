<?php

namespace App\model;

use PDO;
use Exception;

class LoginModel
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function verifyCredentials($username, $password): bool
    {

        $stmt = $this->pdo->prepare("SELECT user_password FROM userinfo WHERE user_username = :username");


        $stmt->bindParam(':username', $username);


        $stmt->execute();


        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['user_password'])) {
            return true;
        }

        return false;
    }

    public function registerUser($username, $password)
    {
        $sql = "INSERT INTO userinfo (user_username, user_password) VALUES (:username, :password)";
        $stmt = $this->pdo->prepare($sql);

        if ($stmt === false) {
            throw new Exception('Failed to prepare SQL statement');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword
        ]);
    }

    public function usernameExists($username): bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM userinfo WHERE user_username = :username');

        if ($stmt === false) {
            throw new Exception('Failed to prepare SQL statement');
        }

        $stmt->execute(['username' => $username]);
        return $stmt->fetch() !== false;
    }
}