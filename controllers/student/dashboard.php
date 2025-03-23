<?php 
  
  namespace Controllers;
  //require __DIR__ . '/../../vendor/autoload.php'; 
  use Models\Course;
  use Models\Quiz;
  use Models\Student;
  $user = \Middleware\AuthMiddleware::validateToken($_COOKIE['jwt']);
  $studentModel = new Student();
  //dd($user);
  $userDB = $studentModel->get($user->id);
  $courseModel = new Course();
  $quizModel = new Quiz();
  $courses = $courseModel->getCoursesWithProfs($user->id);
  $quizzesUnSolved = $quizModel->getByStudentUnSolved($user->id);
  $quizzes = $quizModel->getAttemptedByStudent($user->id);
  //dd($course['stat']);
  view('student/dashboard.view.php', 
  [
    'heading' => 'Student Dashboard',
    'title' => 'Hogwarts Student Dashboard',
    'user' => $user,
    'userDB' => $userDB,
    'courses' => $courses,
    'pastQuizzes' => $quizzes,
    'quizzesUnSolved' => $quizzesUnSolved
  ]
  );