<?php

namespace tests\controller;

use App\controller\OrderController;
use PHPUnit\Framework\TestCase;

class OrderControllerTest extends TestCase
{
    private OrderController $orderController;

    protected function setUp(): void
    {
        $this->orderController = new OrderController();
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
        $this->assertStringContainsString('Price', $output);
    }
}