<?php

$router->get('/login', 'login/create.php');
$router->post('/login', 'login/store.php');


$router->get('/register', 'register/create.php');
$router->post('/register', 'register/store.php');
$router->get('/randomhouse', 'register/randomHouse.php');

$router->get('/profile', 'profile.php');
$router->post('/profile', 'profile.php');
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
$router->post('/add-student', 'students/addStudent.php');
$router->get('/prof/dashboard/students', 'prof/dashboard/StudentsDash.php');
$router->patch('/prof/dashboard/students', 'student/update.php');
$router->get('/prof/dashboard/courses', 'prof/dashboard/CoursesDash.php');
$router->post('/add-course', 'courses/addCourse.php');
$router->get('/prof/dashboard/quizzes', 'prof/dashboard/QuizzesDash.php');
$router->post('/add-quiz', 'quizzes/addQuiz.php');
$router->get('/prof/dashboard/leaderboard', 'prof/dashboard/LeaderboardDash.php');