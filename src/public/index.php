<?php
require '../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index'])
    ->get('/about', [HomeController::class, 'about'])
    ->get('/invoices', [InvoicesController::class, 'index'])
    ->get('/invoices/create', [InvoicesController::class, 'create'])
    ->post('/invoices/store', [InvoicesController::class, 'store']);

$requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
$requestUri = rtrim($_SERVER['REQUEST_URI'], "/");
echo $router->resolve($requestMethod, $requestUri);
