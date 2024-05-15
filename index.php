<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

use App\Router;
use App\Controller\HomeController;
use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\LoginController;
use App\Model\LoginModel;
use App\Controller\RegisterController;
use App\Controller\UserController;
use App\Controller\OrderController;

$pdo = require_once __DIR__ . '/app/model/dbconfig.php';

$router = new Router();
$homeController = new HomeController();
$aboutController = new AboutController();
$contactController = new ContactController();
$loginModel = new LoginModel($pdo);
$loginController = new LoginController($loginModel);
$registerController = new RegisterController($pdo);
$userController = new UserController($pdo);
$orderController = new OrderController($pdo);

$router->get('/', [$homeController, 'index']);
$router->get('/about', [$aboutController, 'index']);
$router->get('/contact', [$contactController, 'index']);
$router->post('/contact', [$contactController, 'submitForm']);
$router->get('/login', [$loginController, 'index']);
$router->post('/login', [$loginController, 'login']);
$router->post('/register', [$registerController, 'register']);
$router->get('/logout', [$loginController, 'logout']);
$router->get('/forgot-password', [$loginController, 'forgotPassword']);
$router->get('/dashboard', [$userController, 'index']);
$router->get('/order', [$orderController, 'index']);
$router->post('/order', [$orderController, 'createOrder']);




$router->run();