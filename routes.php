<?php

$router->get('/login', 'login/create.php');
$router->post('/login', 'login/store.php');


$router->get('/register', 'register/create.php');
$router->post('/register', 'register/store.php');
$router->get('/randomhouse', 'register/randomhouse.php');

$router->get('/logout', 'logout.php');

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/history', 'history.php');
$router->get('/dashboard', 'student/dashboard.php');
$router->get('/courses', 'courses.php');
$router->get('/shop', 'shop.php');

$router->get('/admin', 'notes/index.php');
$router->get('/admin/professors', 'admin/ProfessorsDash.php');

$router->get('/prof/dashboard', 'prof/dashboard.php');
$router->get('/prof/dashboard/students', 'prof/dashboard/StudentDash.php');
$router->get('/prof/dashboard/courses', 'prof/dashboard/CoursesDash.php');
$router->get('/prof/dashboard/quizez', 'prof/dashboard/QuizzezDash.php');