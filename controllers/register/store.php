<?php

use Rakit\Validation\Validator;
use Controllers\AuthController;
require_once base_path('controllers/AuthController.php');
$validator = new Validator();

$validation = $validator->make($_POST, [
  'name' => 'required|min:3|max:50',
  'email' => 'required|email',
  'password' => 'required|min:6',
]);

$validation->validate();

if ($validation->fails()) {
  // Handle validation errors
  $errors = $validation->errors();
  echo json_encode(['status' => 'error', 'errors' => $errors->firstOfAll()]);
  exit;
}

// Sanitize input data
$name = htmlspecialchars($_POST['name']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Register the student
$authController = new AuthController();
$result = $authController->register(
  $name,
  $email,
  $password,
  1,
  1
);

if ($result) {
  
  // dd($result);
  // Set the token in a cookie
  setcookie('jwt', $result['token']); 

  // Redirect to the dashboard
  redirect('dashboard');
  exit;
} else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to register student']);
}
