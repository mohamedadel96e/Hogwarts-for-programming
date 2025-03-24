<?php

use Middleware\AuthMiddleware;
use Config\Config;
use Models\Student;

  $jwt = $_COOKIE['jwt'] ?? null;
  $data = AuthMiddleware::validateToken($jwt);
  $user = (object)(new Student())->get($data->id);

  $house = Config::HOUSES[$user->house_id];
  $wand = (object)(new \Models\Wand())->get($user->wand_id);
view('auth/randomHouse.view.php',
  [
    'house' => $house,
    'wand' => $wand
]);
exit;