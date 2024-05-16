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
        $stmt = $this->pdo->prepare("SELECT user_password, user_role FROM userinfo WHERE user_username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['user_password'])) {
            $_SESSION['role'] = $user['user_role']; // Store the user's role in the session
            return true;
        }

        return false;
    }

    public function registerUser($username, $password, $role): void
    {
        if ($_SESSION['role'] !== 'admin') {
            $_SESSION['error'] = "Vous n'avez pas les droits pour créer un utilisateur";
            header('Location: /login');
            exit;
        } else {
            $sql = "INSERT INTO userinfo (user_username, user_password, user_role) VALUES (:username, :password, :role)";
            $stmt = $this->pdo->prepare($sql);

            if ($stmt === false) {
                throw new Exception('Failed to prepare SQL statement');
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt->execute([
                'username' => $username,
                'password' => $hashedPassword,
                'role' => $role
            ]);
        }
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




    public function addUser($username, $password, $role): void
    {

    }

    public function editUser($id, $username, $password, $role): void
    {
        // SQL to update a user's details
    }

    public function deleteUser($id): void
    {
        // SQL to delete a user
    }


}