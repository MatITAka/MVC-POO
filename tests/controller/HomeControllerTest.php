<?php

namespace tests\controller;

use PHPUnit\Framework\TestCase;
use App\Controller\HomeController;

class HomeControllerTest extends TestCase
{
    private $homeController;

    protected function setUp(): void
    {
        $this->homeController = new HomeController();
    }

    public function testIndex()
    {
        // Start output buffering
        ob_start();

        // Call the index method
        $this->homeController->index();

        // Get the output
        $output = ob_get_clean();

        // Assert that the output contains the expected content
        $this->assertStringContainsString('Default', $output);
    }
}