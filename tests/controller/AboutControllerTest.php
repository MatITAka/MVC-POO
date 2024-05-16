<?php

namespace tests\controller;

use App\controller\AboutController;
use PHPUnit\Framework\TestCase;

class AboutControllerTest extends TestCase
{
    private AboutController $aboutController;

    protected function setUp(): void
    {
        $this->aboutController = new AboutController();
    }

    public function testIndex()
    {
        // Start output buffering
        ob_start();

        // Call the index method
        $this->aboutController->index();

        // Get the output
        $output = ob_get_clean();

        // Assert that the output contains the expected content
        $this->assertStringContainsString('Join Us', $output);
    }
}