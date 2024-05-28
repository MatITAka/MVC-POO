<?php

    namespace tests\controller;

    use App\controller\UserController;
    use PHPUnit\Framework\TestCase;


    class UserControllerTest extends TestCase
    {
        public function testGetUser()
        {
            $userController = new UserController();
            $this->assertEquals('User', $userController->getUser());
        }
    }
