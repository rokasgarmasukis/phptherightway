<?php
require '../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../app/views');

use App\App;
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;

$router = new Router();

$router->get('/', [HomeController::class, 'index'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/download', [HomeController::class, 'download'])
    ->get('/about', [HomeController::class, 'about'])
    ->get('/invoices', [InvoicesController::class, 'index'])
    ->get('/invoices/create', [InvoicesController::class, 'create'])
    ->post('/invoices/create', [InvoicesController::class, 'store']);


$request = ['uri' => $_SERVER['REQUEST_URI'], 'method' => strtolower($_SERVER['REQUEST_METHOD'])];

$config = [
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
];

(new App($router, $request, $config))->run();
