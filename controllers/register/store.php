<?php
use Config\Config;
use Rakit\Validation\Validator;
use Controllers\AuthController;
use Models\Wand;
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
  view('auth/register.view.php', ['errors' => $errors->firstOfAll()]);
  exit;
}

$houses = Config::HOUSES;
$wands = (new Wand())->getAll();

// Sanitize input data
$name = trim(htmlspecialchars($_POST['name']));
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$wand = $wands[rand(2, count( $wands))];
// Generate random house ID
$houseId = array_rand($houses);
$houseName = $houses[$houseId];


// Register the student
$authController = new AuthController();
$result = $authController->register(
  name: $name,
  email: $email,
  password: $password,
  houseId: $houseId,
  wandId: $wand['id']
);

if ($result) {
  // dd($result);
  // Set the token in a cookie
  if(isset($result['error'])) {
    view('auth/register.view.php', ['error' => $result['error']]);
    exit;
  }
  setcookie('jwt', $result['token'], time() + Config::JWT_EXPIRATION); 
  // Redirect to the dashboard
  redirect('/randomhouse');
  exit;
} else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to register student']);
}
