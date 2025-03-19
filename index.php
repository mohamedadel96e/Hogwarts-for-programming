<?php

const BASE_PATH = __DIR__ ;

require BASE_PATH . '/vendor/autoload.php';
require BASE_PATH . '/includes/functions.php';
require BASE_PATH . '/bootstrap.php';

$router = new \Includes\Router();
require BASE_PATH . '/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


$router->route($uri, $method);