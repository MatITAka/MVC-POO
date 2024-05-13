<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Router;
use App\Controller\HomeController;
use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\LoginController;
use App\Model\LoginModel;
use App\Controller\RegisterController;

$router = new Router();
$homeController = new HomeController();
$aboutController = new AboutController();
$contactController = new ContactController();
$loginModel = new LoginModel();
$loginController = new LoginController($loginModel);
$registerController = new RegisterController($loginModel);

$router->get('/', [$homeController, 'index']);
$router->get('/about', [$aboutController, 'index']);
$router->get('/contact', [$contactController, 'index']);
$router->post('/contact', [$contactController, 'submitForm']);
$router->get('/login', [$loginController, 'index']);
$router->post('/login', [$loginController, 'login']);
$router->get('/register', [$registerController, 'register']);

$router->run();
