<?php
session_start();

use App\Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';
require(BASE_PATH . 'app/Core/functions.php');



$router = new Router();


//ROUTES FROM PROJECT
require(BASE_PATH . 'app/Controllers/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];



$router->route($uri, $method);
