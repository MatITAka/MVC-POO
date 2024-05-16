<?php

namespace App\controller;

class ContactController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index(): void
    {
        $content = __DIR__ . '/../view/contact.php';
        include __DIR__ . '/../view/layout.php';
    }

    public function submitForm(): void
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $date = date('Y-m-d H:i:s');

        $stmt = $this->pdo->prepare("INSERT INTO messages (name, email, message, date) VALUES (:name, :email, :message, :date)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':date', $date);

        $stmt->execute();

        header('Location: /contact');
    }

    public function list(): void
    {
        $stmt = $this->pdo->prepare("SELECT * FROM messages");
        $stmt->execute();
        $messages = $stmt->fetchAll();

        $content = __DIR__ . '/../view/list.php';
        include __DIR__ . '/../view/layout.php';
    }
}