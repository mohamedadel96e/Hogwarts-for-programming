<?php

use Rakit\Validation\Validator;
use Controllers\AuthController;
use Config\Config;

require_once base_path('controllers/AuthController.php');
$validator = new Validator();

$validation = $validator->make($_POST, [
  'email' => 'required|email',
  'password' => 'required|min:6',
]);

$validation->validate();

if ($validation->fails()) {
  // Handle validation errors
  $errors = $validation->errors();
  view('auth/login.view.php', ['errors' => $errors->firstOfAll()]);
  exit;
}

// Sanitize input data
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
// dd($email);
// $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$password = $_POST['password'];
// Register the student 
$authController = new AuthController();
$result = $authController->login(
  $email,
  $password
);

if ($result) {
  if(isset($result['error'])) {
    view('auth/login.view.php', ['error' => $result['error']]);
    exit;
  }
  
  // dd($result);
  // Set the token in a cookie
  setcookie('jwt', $result['token'], time() + Config::JWT_EXPIRATION); 

  // Redirect to the dashboard
  redirect('dashboard');
  exit;
} else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to register student']);
}
