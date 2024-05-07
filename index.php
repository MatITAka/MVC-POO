<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Router;

$router = new Router();

$router->get('/', function() {
    echo 'Hello, world!';
});

$router->run();

