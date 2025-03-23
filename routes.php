<?php

$router->get('/login', 'login/create.php');
$router->post('/login', 'login/store.php');


$router->get('/register', 'register/create.php');
$router->post('/register', 'register/store.php');
$router->get('/randomhouse', 'register/randomHouse.php');

$router->get('/profile', 'profile.php');
$router->post('/profile', 'profile.php');
$router->get('/logout', 'logout.php');
$router->delete('/profile', 'student/delete.php');

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/history', 'history.php');
$router->get('/dashboard', 'student/dashboard.php');
$router->get('/courses', 'courses.php');
$router->get('/shop', 'shop.php');

$router->post('/enroll', 'student/enroll.php');

$router->get('/admin', 'notes/index.php');
$router->get('/admin/professors', 'admin/ProfessorsDash.php');

$router->get('/prof/dashboard', 'prof/dashboard.php');
$router->post('/add-student', 'student/addStudent.php');
$router->get('/prof/dashboard/students', 'prof/dashboard/StudentsDash.php');
$router->patch('/prof/dashboard/students', 'student/update.php');
$router->get('/prof/dashboard/professors', 'prof/dashboard/ProfessorsDash.php');
$router->post('/add-professor', 'professor/addProfessor.php');
$router->get('/prof/dashboard/courses', 'prof/dashboard/CoursesDash.php');
$router->post('/add-course', 'courses/addCourse.php');
$router->get('/prof/dashboard/quizzes', 'prof/dashboard/QuizzesDash.php');
$router->post('/add-quiz', 'quizzes/addQuiz.php');
$router->get('/prof/dashboard/leaderboard', 'prof/dashboard/LeaderboardDash.php');

$router->get('/courses/show', 'courses/show.php');
$router->put('/courses', 'courses/update.php');
$router->delete('/courses', 'courses/delete.php');

$router->get('/quizzes/show', 'quizzes/show.php');
$router->put('/quizzes', 'quizzes/update.php');
$router->delete('/quizzes', 'quizzes/delete.php');

$router->post('/quizzes/attempt', 'quizzes/attempt.php');

$router->post('/students/show', 'student/show.php');
$router->put('/students', 'student/update.php');
$router->delete('/students', 'student/delete.php');

$router->get('/professors/show', 'professors/show.php');
$router->put('/professors', 'professors/update.php');
$router->delete('/professors', 'professors/delete.php');

