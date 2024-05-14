<?php

namespace App\model;

use PDO;

class LoginModel
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function verifyCredentials($username, $password): bool
    {
        // Prepare the SQL statement
        $stmt = $this->pdo->prepare("SELECT user_password FROM userinfo WHERE user_username = :username");

        // Bind the parameters
        $stmt->bindParam(':username', $username);

        // Execute the statement
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch();

        // If the user exists and the password is correct, return true
        if ($user && password_verify($password, $user['user_password'])) {
            return true;
        }

        // If the user doesn't exist or the password is incorrect, return false
        return false;
    }

    public function registerUser($username, $password)
    {
        $sql = "INSERT INTO userinfo (user_username, user_password) VALUES (:username, :password)";
        $stmt = $this->pdo->prepare($sql);

        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword
        ]);
    }

    public function emailExists($email)
    {
    }
}