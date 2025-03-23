<?php 
  
use Models\Student;

$studentModel = new Student();

$id = $_POST['id'];

$student = $studentModel->get($id);

view('student/show.view.php', ['student' => $student]);