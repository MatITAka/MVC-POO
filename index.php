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
use App\Controller\ProductController;
use App\Model\ProductModel;
use App\Controller\CartController;
use App\Controller\CheckoutController;
use App\Controller\PaymentController;


$pdo = require_once __DIR__ . '/app/model/dbconfig.php';

$router = new Router();
$homeController = new HomeController();
$aboutController = new AboutController();
$contactController = new ContactController($pdo);
$loginModel = new LoginModel($pdo);
$productModel = new ProductModel($pdo);
$loginController = new LoginController($loginModel);
$registerController = new RegisterController($pdo);
$userController = new UserController($pdo);
$orderController = new OrderController($pdo);
$productController = new ProductController($productModel);
$cartController = new CartController($productModel);
$checkoutController = new CheckoutController($productModel);
$paymentController = new PaymentController($productModel);


$router->get('/', [$homeController, 'index']);

$router->get('/about', [$aboutController, 'index']);

$router->get('/contact', [$contactController, 'index']);
$router->post('/contact', [$contactController, 'submitForm']);
$router->get('/contactList', [$contactController, 'list']);

$router->get('/login', [$loginController, 'index']);
$router->post('/login', [$loginController, 'login']);
$router->post('/register', [$registerController, 'register']);
$router->get('/logout', [$loginController, 'logout']);
$router->get('/forgot-password', [$loginController, 'forgotPassword']);


$router->get('/dashboard', [$userController, 'index']);

$router->get('/order', [$orderController, 'index']);
$router->post('/createOrder', [$orderController, 'createOrder']);


$router->get('/products', [$productController, 'productList']);
$router->get('/addProducts', [$productController, 'addProducts']);
$router->post('/addProducts', [$productController, 'addProducts']);


$router->get('/cart', [$cartController, 'index']);
$router->get('/checkout' , [$checkoutController, 'index']);
$router->post('/validateOrder', [$checkoutController, 'validateOrder']);
$router->get('/checkoutSuccess', [$checkoutController, 'checkoutSuccess']);
$router->post('/cart/add/{id}', function($id) use ($productModel) {
    $productModel->addToCart($id);
});
$router->post('/cart/remove/{id}', function($id) use ($productModel) {
    $productModel->removeFromCart($id);
});

$router->get('/payment', [$paymentController, 'index']);
$router->post('/paymentRequest', [$paymentController, 'payRequest']);
$router->get('/paymentSuccess', [$paymentController, 'paymentSuccess']);
$router->get('/paymentFail', [$paymentController, 'paymentFail']);

$router->get('/updateProduct', [$productController, 'updateProductIndex']);
$router->post('/updateProduct/{id}', [$productController, 'updateProduct']);
$router->post('/deleteProduct/{id}', [$productController, 'deleteProduct']);

$router->run();