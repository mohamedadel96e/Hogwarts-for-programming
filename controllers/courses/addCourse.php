<?php

use Models\Course;
use Middleware\AuthMiddleware;
$jwt = $_COOKIE['jwt'];
$course = new Course();

$name = trim(htmlspecialchars($_POST['name']));
$description = trim(htmlspecialchars($_POST['description']));

$data = AuthMiddleware::validateToken($jwt);

$course->create($name, $description, $data->id);
redirect('/prof/dashboard/courses');