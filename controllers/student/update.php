<?php 
  use Models\Student;

$id = $_POST['id'];
$status = $_POST['status'];
$student = new Student();

$student->updateStatus($id, $status);

redirect('/prof/dashboard/students');
