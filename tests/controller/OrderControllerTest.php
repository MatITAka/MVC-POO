<?php

namespace tests\controller;

use App\controller\OrderController;
use PHPUnit\Framework\TestCase;

class OrderControllerTest extends TestCase
{
    private OrderController $orderController;

    protected function setUp(): void
    {
        $_SESSION['username'] = 'admin';

        $this->orderController = new OrderController();
    }

    protected function tearDown(): void
    {
        $_SESSION = [];
    }

    public function testIndex()
    {
        // Start output buffering
        ob_start();

        // Call the index method
        $this->orderController->index();

        // Get the output
        $output = ob_get_clean();

        // Assert that the output contains the expected content
        $this->assertStringContainsString('Order form', $output);
    }

    public function testCreateOrder()
    {
        $_POST['submit'] = 'submit';
        $_POST['firstName'] = 'John';
        $_POST['lastName'] = 'Doe';
        $_POST['address'] = '123 Main St';
        $_POST['country'] = 'USA';
        $_POST['city'] = 'New York';
        $_POST['price'] = 100;

        // Call the createOrder method
        $this->orderController->createOrder();

        // Assert that the session contains the expected content
        $this->assertArrayHasKey('username', $_SESSION);
    }

}