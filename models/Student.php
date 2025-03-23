<?php
// namespace App\Models;
namespace Models;


use Includes\Database;
use Models\Professor;

class Student
{
  private $db;

  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  public function create($name, $email, $password, $houseId, $wandId, $balance = 1000)
  {
    $professor = new Professor();
    if ($this->emailExists($email) || $professor->getByEmail($email)) {
      return ['error' => 'Email already exists'];
    }
    $sql = "INSERT INTO students (name, email, password, house_id, wand_id, balance) VALUES (:name, :email, :password, :house_id, :wand_id, :balance)";
    $stmt = $this->db->prepare($sql);

    if (
      $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'house_id' => $houseId,
        'wand_id' => $wandId,
        'balance' => $balance
      ])
    ) {

      return ['message' => 'Student registered successfully'];
    } else {
      return ['error' => 'Registration failed'];
    }
  }

  public function get($id)
  {
    $sql = "SELECT * FROM students WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
  }

  public function getAll()
  {
    $sql = "SELECT * FROM students";
    $stmt = $this->db->query($sql);
    return $stmt->fetchAll();
  }

  public function update($id, $name, $email, $password, $houseId, $balance)
  {
    $sql = "UPDATE students SET name = :name, email = :email, password = :password, house_id = :house_id, balance = :balance WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
      'id' => $id,
      'name' => $name,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_BCRYPT),
      'house_id' => $houseId,
      'balance' => $balance
    ]);
  }
  public function updateWithoutPassword($id, $name, $email, $houseId, $balance)
  {
    $sql = "UPDATE students SET name = :name, email = :email, house_id = :house_id, balance = :balance WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
      'id' => $id,
      'name' => $name,
      'email' => $email,
      'house_id' => $houseId,
      'balance' => $balance
    ]);
  }


  public function delete($id)
  {
    $sql = "DELETE FROM students WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
  }

  public function login($email, $password)
  {
    $sql = "SELECT * FROM students WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['email' => $email]);
    $student = $stmt->fetch();
    if ($student && password_verify($password, $student['password'])) {
      return $student;
    }
    return null;
  }


  private function emailExists($email)
  {
    $sql = "SELECT * FROM students WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['email' => $email]);

    return $stmt->fetch() ? true : false;
  }

  public function getByEmail($email)
  {
    $sql = "SELECT * FROM students WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['email' => $email]);
    return $stmt->fetch();
  }

  public function updateProfilePic($id, $filename)
  {
    $sql = "UPDATE students SET profilePicture = :filename WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id, 'filename' => $filename]);
  }

  public function updateName($id, $name)
  {
    $sql = "UPDATE students SET name = :name WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name]);
  }
  public function updateStatus($id, $status)
  {
    $sql = "UPDATE students SET status = :status WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id, 'status' => $status]);
  }

  public function getByCourse($courseId)
  {
    $sql = "SELECT * FROM students s JOIN enrollments e ON s.id = e.student_id JOIN courses c ON e.course_id = c.id WHERE c.id = :course_id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['course_id' => $courseId]);
    return $stmt->fetchAll();
  }

  public function enroll($studentId, $courseId)
  {
    $sql = "INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['student_id' => $studentId, 'course_id' => $courseId]);
  }

  public function getByHouse($houseId)
  {
    $sql = "SELECT * FROM students WHERE house_id = :house_id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['house_id' => $houseId]);
    return $stmt->fetchAll();
  }

  public function enrollInCourse($studentId, $courseId)
  {
    $sql = "INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['student_id' => $studentId, 'course_id' => $courseId]);
  }
}
