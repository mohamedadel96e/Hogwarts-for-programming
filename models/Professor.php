<?php
// namespace App\Models;
namespace Models;
use Includes\Database;

class Professor {
  private $db;

  public function __construct() {
    $this->db = Database::getInstance();
  }

  public function create($name, $email, $password) {
    if ($this->emailExists($email)) {
      return ['error' => 'Email already exists'];
    }
    $sql = "INSERT INTO professors (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $this->db->prepare($sql);
    if ($stmt->execute([
      'name' => $name,
      'email' => $email,
      'password' => $password
    ])) {
      return ['message' => 'Professor registered successfully'];
    } else {
      return ['error' => 'Registration failed'];
    }
  }

  public function get($id) {
    $sql = "SELECT * FROM professors WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
  }

  public function getAll() {
    $sql = "SELECT * FROM professors";
    $stmt = $this->db->query($sql);
    return $stmt->fetchAll();
  }

  public function update($id, $name, $email, $password) {
    $sql = "UPDATE professors SET name = :name, email = :email, password = :password WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
      'id' => $id,
      'name' => $name,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
  }

  public function delete($id) {
    $sql = "DELETE FROM professors WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
  }

  private function emailExists($email) {
    $sql = "SELECT * FROM professors WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['email' => $email]);
    return $stmt->fetch() ? true : false;
  }

  public function getByEmail($email) {
    $sql = "SELECT * FROM professors WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['email' => $email]);
    return $stmt->fetch();
  }
}
