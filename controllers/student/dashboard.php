<?php 
  $user = \Middleware\AuthMiddleware::validateToken($_COOKIE['jwt']);
  // dd($user);
view('student/dashboard.view.php', 
  [
    'heading' => 'Student Dashboard',
    'title' => 'Hogwarts Student Dashboard',
    'user' => $user
  ]
);