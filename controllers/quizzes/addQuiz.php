<?php

use Models\Quiz;
use Middleware\AuthMiddleware;
$jwt = $_COOKIE['jwt'];
$quiz = new Quiz();

$question = trim(htmlspecialchars($_POST['question']));
$answer = (bool) $_POST['answer'];
$points = $_POST['points'];
$course_id = $_POST['course_id'];

$data = AuthMiddleware::validateToken($jwt);
$quiz->create(question: $question, answer: $answer, points: $points, courseId: $course_id, professorId: $data->id);
redirect('/prof/dashboard/quizzes');