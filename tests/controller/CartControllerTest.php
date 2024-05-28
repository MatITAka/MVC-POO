<?php

namespace tests\controller;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use App\Controller\CartController;
use App\Model\ProductModel;

class CartControllerTest extends TestCase
{
    private CartController $cartController;


    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        // Create a mock for the ProductModel class
        $productModel = $this->createMock(ProductModel::class);
         $this->cartController = new CartController($productModel);
    }

    public function testIndex()
    {
        // Start output buffering
        ob_start();

        // Call the index method
        $this->cartController->index();

        // Get the output
        $output = ob_get_clean();

        // Assert that the output contains the expected content
        $this->assertStringContainsString('Cart', $output);
    }
}


