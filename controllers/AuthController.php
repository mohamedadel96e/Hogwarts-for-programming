<?php 
  namespace Controllers;

  use Firebase\JWT\JWT;
  use Models\Student;
  require_once base_path('models/Student.php');
  use Models\Professor;
  require_once base_path('models/Professor.php');
  use Config\Config;

  class AuthController {
    private $student;
    private $professor;

    public function __construct() {
      $this->student = new Student();
      $this->professor = new Professor();
    }

    public function register($name, $email, $password, $houseId, $wandId, $balance = 1000) {
      $result = $this->student->create($name, $email, $password, $houseId, $wandId, $balance);
      if (isset($result['error'])) {
        return $result;
      }
      return $this->login($email, $password);
    }

    public function login($email, $password) {
      
      if(!$email || !$password) {
        return ['error' => 'Email and password are required'];
      }
      $role = $this->professor->getByEmail($email) ? 'professor' : 'student';
      if ($role === 'professor') {
        return $this->professorLogin($email, $password);
      }
      $student = $this->student->getByEmail($email);

      if (!$student || !password_verify($password, $student['password'])) {
        return ['error' => 'Invalid email or password'];
      }

      $payload = [
        'id' => $student['id'],
        'name' => $student['name'],
        'email' => $student['email'],
        'house_id' => $student['house_id'],
        'wand_id' => $student['wand_id'],
        'balance' => $student['balance'],
        'role' => 'student',
        'exp' => time() + Config::JWT_EXPIRATION
      ];

      $token =  JWT::encode(
        payload: $payload, 
        key: Config::JWT_SECRET, 
        alg: Config::JWT_ALGORITHM
      );
      return ['token' => $token, 'message' => 'Login successful'];
    }

    private function professorLogin($email, $password) {
      $professor = $this->professor->getByEmail($email);
      if (!$professor || !password_verify($password, $professor['password'])) {
        return ['error' => 'Invalid email or password'];
      }

      $payload = [
        'id' => $professor['id'],
        'name' => $professor['name'],
        'email' => $professor['email'],
        'role' => $professor['role'],
        'exp' => time() + Config::JWT_EXPIRATION
      ];

      $token =  JWT::encode(
        payload: $payload, 
        key: Config::JWT_SECRET, 
        alg: Config::JWT_ALGORITHM
      );
      redirect('/');
      return ['token' => $token, 'message' => 'Login successful'];
    }
  }