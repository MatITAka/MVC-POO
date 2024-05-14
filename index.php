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

// Use the variables from dbconfig.php to create a new PDO instance
$pdo = require_once __DIR__ . '/app/model/dbconfig.php';

$router = new Router();
$homeController = new HomeController();
$aboutController = new AboutController();
$contactController = new ContactController();
$loginModel = new LoginModel($pdo);
$loginController = new LoginController($loginModel);
$registerController = new RegisterController($pdo);

$router->get('/', [$homeController, 'index']);
$router->get('/about', [$aboutController, 'index']);
$router->get('/contact', [$contactController, 'index']);
$router->post('/contact', [$contactController, 'submitForm']);
$router->get('/login', [$loginController, 'index']);
$router->post('/login', [$loginController, 'login']);
$router->post('/register', [$registerController, 'register']);
$router->get('/logout', [$loginController, 'logout']);
$router->get('/forgot-password', [$loginController, 'forgotPassword']);

$router->run();