<?php

$router->get('/login', 'login/create.php');
$router->post('/login', 'login/store.php');


$router->get('/register', 'register/create.php');
$router->post('/register', 'register/store.php');


$router->get('/', 'index.php');
$router->get('/dashboard', 'student/dashboard.php');
$router->get('/Dashboard/Students', 'dashboard/StudentDash.php');
$router->get('/dashboard/courses', 'dashboard/CoursesDash.php');
$router->get('/dashboard/quizez', 'dashboard/QuizzezDash.php');
$router->get('/dashboard/professors', 'dashboard/ProfessorsDash.php');
$router->get('/courses', 'courses.php');
$router->get('/shop', 'shop.php');

$router->get('/admin', 'notes/index.php');