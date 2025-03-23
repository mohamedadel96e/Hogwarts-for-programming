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
    view('prof\professorsDash.view.php', ['errors' => $errors->firstOfAll()]);
    exit;
}


// Sanitize input data
$name = trim(htmlspecialchars($_POST['name']));
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];


// Register the student
$authController = new AuthController();
$result = $authController->registerProfessor(
    $name,
    $email,
    $password,
);

if ($result) {
    // dd($result);
    // Set the token in a cookie
    if (isset($result['error'])) {
        view('prof/professorsDash.view.php', ['error' => $result['error']]);
        exit;
    }
    // Redirect to the dashboard
    redirect('/prof/dashboard/professors');
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to register student']);
}
