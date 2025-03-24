<?php
use Config\Config;
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
    view('prof\studentDash.view.php', ['errors' => $errors->firstOfAll()]);
    exit;
}

$houses = Config::HOUSES;

// Sanitize input data
$name = trim(htmlspecialchars($_POST['name']));
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];
$houseId = $_POST['house_id'];
$balance = $_POST['balance'];
$wands = (new \Models\Wand())->getAll();
$wand = $wands[rand(2, count( $wands))];


// Register the student
$authController = new AuthController();
$result = $authController->registerOnly(
    $name,
    $email,
    $password,
    $houseId,
    $wand['id'],
    $balance
);

if ($result) {
    // dd($result);
    // Set the token in a cookie
    if (isset($result['error'])) {
        view('prof/studentDash.view.php', ['error' => $result['error']]);
        exit;
    }
    // Redirect to the dashboard
    redirect('/prof/dashboard/students');
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to register student']);
}
