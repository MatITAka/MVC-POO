<?php

namespace App\model;

use PDO;
use Exception;

class ProductModel
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addProducts($name, $price, $description, $type): void
    {
        $sql = "INSERT INTO products (product_name, product_price, product_desc, product_type) VALUES (:name, :price, :description, :type)";
        $stmt = $this->pdo->prepare($sql);

        if ($stmt === false) {
            throw  new Exception('Failed to prepare SQL statement');
        }

        $stmt->execute([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'type' => $type
        ]);
    }

    public function getProducts(): array
    {
        $stmt = $this->pdo->prepare("SELECT product_id ,product_name, product_desc, product_type, product_price FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById(mixed $productId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE product_id = :id");
        $stmt->execute(['id' => $productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addToCart($id): void
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if ($id !== false && $id !== null) {
            $_SESSION['cart'][] = $id;
        }
        header('Location: /products');
    }

    public function removeFromCart($id): void
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if ($id !== false && $id !== null) {
            $index = array_search($id, $_SESSION['cart']);
            if ($index !== false) {
                unset($_SESSION['cart'][$index]);
            }
        }
        header('Location: /cart');
    }

}