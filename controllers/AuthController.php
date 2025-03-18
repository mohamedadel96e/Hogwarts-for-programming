<?php 
  namespace Controllers;

  use Firebase\JWT\JWT;
  use Models\Student;
  use Config\Config;

  class AuthController {
    private $student;

    public function __construct() {
      $this->student = new Student();
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
        'exp' => time() + Config::JWT_EXPIRATION
      ];

      $token =  JWT::encode(
        payload: $payload, 
        key: Config::JWT_SECRET, 
        alg: Config::JWT_ALGORITHM
      );
      return ['token' => $token, 'message' => 'Login successful'];
    }
  }