<?php 
  use Models\Student;

$id = $_POST['id'];
$status = $_POST['status'];
$student = new Student();
if(!$_POST['_method'])
  $student->updateStatus($id, $status);
else {
  $password = trim($_POST['password']);

  if($password === "") {
    $student->updateWithoutPassword($id, $_POST['name'], $_POST['email'], $_POST['houseId'], $_POST['balance']);
  }else
    $student-> update($id, $_POST['name'], $_POST['email'], $_POST['password'], $_POST['houseId'], $_POST['balance']);
}

redirect('/prof/dashboard/students');
