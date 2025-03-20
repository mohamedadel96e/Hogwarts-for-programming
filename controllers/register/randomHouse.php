<?php

use Middleware\AuthMiddleware;
use Config\Config;

  $jwt = $_COOKIE['jwt'] ?? null;
  $data = AuthMiddleware::validateToken($jwt);
  $house = Config::HOUSES[$data->house_id];
view('auth/randomHouse.view.php',
  [
    'house' => $house
]);
exit;