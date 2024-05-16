<?php

namespace tests\controller;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use App\Controller\ContactController;

class ContactControllerTest extends TestCase
{
    private ContactController $contactController;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        // Create a mock PDO object
        $pdo = $this->createMock(\PDO::class);

        // Instantiate the ContactController with the mock PDO object
        $this->contactController = new ContactController($pdo);
    }

    public function testIndex()
    {
        // Start output buffering
        ob_start();

        // Call the index method
        $this->contactController->index();

        // Get the output
        $output = ob_get_clean();

        // Assert that the output contains the expected content
        $this->assertStringContainsString('Submit', $output);
    }

    /**
     * @throws Exception
     */
    public function testSubmitForm()
    {
        // Mock $_POST array
        $_POST = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello, world!'
        ];

        // Create a mock PDO object
        $pdo = $this->createMock(\PDO::class);

        // Create a mock PDOStatement object
        $stmt = $this->createMock(\PDOStatement::class);

        // Set up the mock PDO object
        $pdo->expects($this->once())
            ->method('prepare')
            ->with('INSERT INTO messages (name, email, message, date) VALUES (:name, :email, :message, :date)')
            ->willReturn($stmt);

        $stmt->expects($this->exactly(4))
            ->method('bindParam')
            ->willReturnCallback(function($param, &$variable) {
                $this->assertIsString($variable);
                return true;
            });

        $stmt->expects($this->once())
            ->method('execute');

        // Replace the require statement in the submitForm method
        $contactController = new ContactController($pdo);

        // Call the submitForm method
        $contactController->submitForm();
    }

}