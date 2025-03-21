<?php 

namespace Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\ExpiredException;
use Config\Config;
use Exception;

class AuthMiddleware {

  public static function protect() {
    $headers = getallheaders();
    if (!isset($headers['Authorization'])) {
      http_response_code(401);
      echo json_encode(['error' => 'Authorization header is required']);
      exit();
    }

    try {
      $authHeader = $headers['Authorization'];
      $token = str_replace('Bearer ', '', $authHeader);
      
      $decoded = JWT::decode(
          $token,
          new Key(Config::JWT_SECRET, Config::JWT_ALGORITHM)
      );

      return $decoded;
    } catch(ExpiredException $e) {
      http_response_code(401);
      echo json_encode(['error' => 'Token expired']);
      exit;
    } catch(SignatureInvalidException $e) {
      http_response_code(401);
      echo json_encode(['error' => 'Invalid token signature']);
      exit;
    } catch(Exception $e) {
      http_response_code(401);
      echo json_encode(['error' => 'Invalid token']);
      exit;
    }
  }


  public static function validateToken($token) {
    try {
      return JWT::decode($token, new Key(Config::JWT_SECRET, Config::JWT_ALGORITHM));
    } catch (Exception $e) {
      return ['error' => 'Invalid or expired token'];
    }
  }

  public static function generateToken($payload) {
    return JWT::encode($payload, Config::JWT_SECRET, Config::JWT_ALGORITHM);
  }

}