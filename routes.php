<?php

$router->get('/hogwarts-for-programming/login', 'login/create.php');
$router->post('/hogwarts-for-programming/login', 'AuthController.php');


$router->get('/hogwarts-for-programming/register', 'register/create.php');
$router->post('/hogwarts-for-programming/register', 'AuthController.php');


$router->get('/hogwarts-for-programming/', 'index.php');
$router->get('/hogwarts-for-programming/dashboard', 'dashboard.php');
$router->get('/hogwarts-for-programming/courses', 'courses.php');
$router->get('/hogwarts-for-programming/shop', 'shop.php');
