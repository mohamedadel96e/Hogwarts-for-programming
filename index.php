<?php

use Symfony\Component\VarDumper\VarDumper;

require 'vendor/autoload.php';
require 'routes.php';



$request = ($_SERVER['REQUEST_URI']);
$request = str_replace('/hogwarts-for-programming', '', $request);
$viewDir = '/views/';

switch ($request) {
  case '':
  case '/':
      require __DIR__ . $viewDir . 'home.php';
      break;

  case '/dashboard':
      require __DIR__ . $viewDir . 'dashboard.php';
      break;

  case '/login':
      require __DIR__ . $viewDir . '/auth/login.php';
      break;
  case '/register':
      require __DIR__ . $viewDir . 'register.php';
      break;
  default:
      http_response_code(404);
      require __DIR__ . $viewDir . '404.php';
}

