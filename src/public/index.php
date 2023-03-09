<?php
require '../vendor/autoload.php';

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../app/views');

use App\View;
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Exceptions\RouteNotFoundException;

$router = new Router();

$router->get('/', [HomeController::class, 'index'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/about', [HomeController::class, 'about'])
    ->get('/invoices', [InvoicesController::class, 'index'])
    ->get('/invoices/create', [InvoicesController::class, 'create'])
    ->post('/invoices/create', [InvoicesController::class, 'store']);

$requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
$requestUri = $_SERVER['REQUEST_URI'];

try {
    echo $router->resolve($requestMethod, $requestUri);
} catch (RouteNotFoundException $e) {
    http_response_code(404);

    echo View::make('errors/404');
}
