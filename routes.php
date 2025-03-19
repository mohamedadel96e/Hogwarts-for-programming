<?php

$router->get('/hogwarts-for-programming/login', 'login/create.php');
$router->post('/hogwarts-for-programming/login', 'login/store.php');


$router->get('/hogwarts-for-programming/register', 'register/create.php');
$router->post('/hogwarts-for-programming/register', 'register/store.php');


$router->get('/hogwarts-for-programming/', 'index.php');
$router->get('/hogwarts-for-programming/dashboard', 'student/dashboard.php');
$router->get('/hogwarts-for-programming/courses', 'courses.php');
$router->get('/hogwarts-for-programming/shop', 'shop.php');

$router->get('/hogwarts-for-programming/admin', 'notes/index.php');