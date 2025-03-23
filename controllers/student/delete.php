<?php 
  use Models\Student;

$previousUri = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';

$id = $_POST['id'];
$student = new Student();

$student->delete($id);

redirect('/logout'); 
