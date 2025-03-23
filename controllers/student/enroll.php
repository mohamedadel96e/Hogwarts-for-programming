<?php 
  
use Models\Student;

$student = new Student();
$student->enroll($_POST['student_id'], $_POST['course_id']);
redirect('/dashboard');