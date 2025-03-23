<?php 
  
  namespace Controllers;
  //require __DIR__ . '/../../vendor/autoload.php'; 
  require_once __DIR__ . '/../../models/Courses.php';
  use Models\Course;

  $user = \Middleware\AuthMiddleware::validateToken($_COOKIE['jwt']);
  
  //dd($user);
  $courseModel = new Course();
  
  $courses = $courseModel->getCoursesWithProfs($user->id);
  //dd($course['stat']);
  view('student/dashboard.view.php', 
  [
    'heading' => 'Student Dashboard',
    'title' => 'Hogwarts Student Dashboard',
    'user' => $user,
    'courses' => $courses
  ]
  );