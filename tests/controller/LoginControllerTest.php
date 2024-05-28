<?php

    namespace tests\controller;

    use JetBrains\PhpStorm\NoReturn;
    use PHPUnit\Framework\TestCase;
    use App\controller\LoginController;
    use App\model\LoginModel;


    class LoginControllerTest extends TestCase {

        public function testConstructor()
        {
            $pdo = $this->createMock(\PDO::class); // Create a mock of the PDO class
            $model = new LoginModel($pdo); // Pass the PDO mock to the LoginModel constructor
            $controller = new LoginController($model); // Pass the LoginModel instance to the LoginController constructor
            $this->assertInstanceOf(LoginController::class, $controller);
        }

        public function testIndex()
        {
            $model = new LoginModel($this->createMock(\PDO::class));
            $controller = new LoginController($model);

            ob_start();
            $controller->index();

            $output = ob_get_clean();
            $this->assertStringContainsString('<h2 class="card-title text-center">Nice to see you again</h2>', $output);
            $this->assertStringContainsString('<h2 class="card-title text-center">Join us</h2>', $output);
        }

        public function testLogin()
        {
            // Create a mock of the LoginModel class
            $model = $this->createMock(LoginModel::class);

            // Stub the verifyCredentials method to return true
            $model->method('verifyCredentials')->willReturn(true);

            $controller = new LoginController($model);

            // Mock $_SERVER['REQUEST_METHOD']
            $_SERVER['REQUEST_METHOD'] = 'POST';

            // Mock $_POST variables
            $_POST['username'] = 'test';
            $_POST['password'] = 'test';

            ob_start();
            $controller->login();
            ob_get_clean();

            $this->expectOutputString('Location: /');

        }

        #[NoReturn] public function testLogout()
        {
                $model = new LoginModel($this->createMock(\PDO::class));
                $controller = new LoginController($model);
                $controller->logout();
                $this->expectOutputString('You have been logged out.');
        }


    }

