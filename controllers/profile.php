<?php

use Models\Student;
use Middleware\AuthMiddleware;

session_start();
if (!isset($_COOKIE['jwt'])) {
  header('Location: /login');
}
$student = new Student();
$user = AuthMiddleware::validateToken($_COOKIE['jwt']);
$user = (object)$student->get($user->id);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $errors = [];

  if (empty($name)) {
    $errors['name'] = 'Name is required';
  }

  if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileType = mime_content_type($_FILES['avatar']['tmp_name']);

    if (!in_array($fileType, $allowedTypes)) {
      $errors['avatar'] = 'Invalid file type. Only JPG, PNG, and GIF are allowed.';
    }

    if ($_FILES['avatar']['size'] > 2097152) { // 2MB
      $errors['avatar'] = 'File size must be less than 2MB';
    }
  }
  if (empty($errors)) {
    if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
      $uploadDir = 'uploads/';
      if (!is_writable($uploadDir)) {
        dd("Upload directory is not writable");
    }
      $filename = uniqid() . '_' . $_FILES['avatar']['name'];
      $targetPath = $uploadDir . $filename;
      // dd($targetPath, $user);
      // dd(move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath));
      if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath)) {
        if ($user->profilePic && file_exists($uploadDir . $user->profilePic && ! $user->profilePic === 'default.png')) {
          unlink($uploadDir . $user->profilePic);
        }
        $student->updateProfilePic($user->id, $filename);
        $user->profilePic = $filename;
      }
    }

    $student->updateName($user->id, $name);
    $user->name = $name;
    $user = (array)$user;
    $user['role'] = 'student';
    setcookie('jwt', AuthMiddleware::generateToken($user), time() + 3600, '/');
    redirect('/profile');
    $_SESSION['success'] = 'Profile updated successfully';
  }
}

$user = AuthMiddleware::validateToken($_COOKIE['jwt']);
$wand = (object)(new \Models\Wand())->get($user->wand_id);

// dd($user);
view(
  'profile.view.php',
  [
    'user' => $user,
    'title' => 'Profile',
    'heading' => 'Profile',
    'wand' => $wand
  ]
);
